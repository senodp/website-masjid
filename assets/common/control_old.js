var dropOBJ;
var dropINS;



//IE9 FIX START

if(!window.console) {
	var console = {
		log : function(){},
		warn : function(){},
		error : function(){},
		time : function(){},
		timeEnd : function(){}
	}
}

//IE9 FIX END


$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
	if ($(e.target).data('linkedTabs') && $(e.relatedTarget).data('linkedTabs')){
		var tabs_to_show = $(e.target).data('linkedTabs');
		var tabs_to_hide = $(e.relatedTarget).data('linkedTabs');
		//console.log(tabs_to_show);
		$(tabs_to_show).addClass('active'); initSummernote(tabs_to_show);
		$(tabs_to_hide).removeClass('active');
	}
})

$(document).on('focusin', function(e) {
	if ($(e.target).closest(".mce-window").length) {
		e.stopImmediatePropagation();
	}
});


$(document).ready(function() {
	initClickAlert();
	initWaitMe();
	initSummernote();
	initSummernoteOnTabs();
	initImageUpload();
	initVideoUpload();
	initEditableTable();
	initDatePicker();
	initSelect2();

	ajaxCRUD.init();
});


var initSelect2 = function(){
	$(".select2").select2();

	// $(".select2-limiting").select2({
	// 	maximumSelectionLength: 2
	// });
}


// < COMMON >
var initClickAlert = function(){
	$('.confirm').add('.btn-delete').add('.btn-confirm').click(function(){ 
		var confirmed = confirm("Are you sure you want to "+$(this).attr('title')+" ?")
		if (confirmed == false) return false;
	});
};

var initSelectChain = function(){ //console.log('select_chain init');
	if ($('select.select_chain').is('*')){ //console.log('select_chain apply');
		$('select.select_chain').change(function(){
			var module = $(this).data('module');
			var target = $(this).data('target');
			var id_parent = $(this).val();
			var id_selected_child = $(target).data('selected');

			// console.log('module = '+module);
			// console.log('target = '+target);
			// console.log('id_parent = '+id_parent);
			// console.log('id_selected_child = '+id_selected_child);

				var link = site_url + 'request/'+module+'/' + id_parent + '/' + id_selected_child;

				$(target).html('<option value="0">Loading data...</option>');

				$.ajax({ url: link, dataType: 'html' }).done(function(html){
					$(target).html(html);
				});

			if (id_parent != '0'){
				$(target).prop('disabled', false);
			} else {
				$(target).prop('disabled', true);
			}
		});

		//$('select.select_chain').trigger('change');
	}
}
// </ COMMON >

var initEditableTable = function(){
	if ($('.table-editable').is('*')){
		$('.table-editable').editableTableWidget();

		$('.table-editable td').on('change', function(evt, newValue) {
			url = $(evt.target).parent().data('url');
			name = $(evt.target).data('name');
			console.log($(evt.target).html());

			if (url !== undefined && name !== undefined){
				url = url+'/'+name;
				var fD = new FormData();
				fD.append(name, newValue);
				fD.append("is_ajax", "1");
				fD.append("is_submit", "1");

				$.ajax({ url: url, dataType: 'html', data: fD, processData: false, contentType: false, method: 'POST' }).always(function(html){
					console.log(html);
				});
			}
		});
	}
}



// < SUMMERNOTE >
var mediaManager = {};

var SummernoteButtonMediaManager = function (context) {
	var ui = $.summernote.ui;
  
	// create button
	var button = ui.button({
		container: false,
		contents: '<i class="note-icon-square" />',
		tooltip: 'Media Manager',
		click: function () {
			mediaManager.context = context;
			
			if ($('body').hasClass('modal-open')){
				ajaxCRUD.popModal(site_url+'control/mediamanager/index/'+page_name, 'mediamanager', 'modal-child');
			} else {
				ajaxCRUD.popModal(site_url+'control/mediamanager/index/'+page_name, 'mediamanager');
			}
		}
	});
  
	return button.render();   // return button as jquery object
}

var initSummernote = function(parent){
	window.setTimeout(function(){
		if (parent == undefined)
			summerEditors = $('textarea.editor');
		else
			summerEditors = $(parent).find('textarea.editor');

		summerEditors.each(function(i){
			summerEditor = $(this);

			if (summerEditor.is(':visible')){
				summerOptions = {
					toolbar: [
						// ['font', ['strikethrough', 'superscript', 'subscript']],
						['style', ['bold', 'italic', 'underline', 'clear']],
						['fontsize', ['fontname', 'fontsize']],
						['insert', ['link','mediamanager','table']],
						['para', ['ul', 'ol', 'paragraph']],
						['history', ['undo','redo']],
						['misc', ['codeview']]
					],
					onInit: function(container) { 
						$('body').on('keyup', '.note-editing-area textarea', $(container), function() { var html = $('.note-codable').data('cmEditor').getValue(); $('.wysiwyg').val(html); }); 
					},
					fontSizes: ['10', '12', '14', '16', '18', '20', '22'],
					buttons: {
						mediamanager: SummernoteButtonMediaManager
					}
				};

				summerEditorHeight = summerEditor.data('height');

				if ($.isNumeric(summerEditorHeight))
					summerOptions.height = summerEditorHeight;

				summerEditor.summernote(summerOptions);
			}
		});

		$(parent).find('.note-codable').on('blur', function() {
			var codeviewHtml        = $(this).val();
			var $summernoteTextarea = $(this).closest('.note-editor').siblings('textarea');

			$summernoteTextarea.val(codeviewHtml);
		 });
	}, 150)
};

var initSummernoteOnTabs = function(parent){
	if (parent == undefined)
		tabs = $('[data-toggle="tab"]');
	else
		tabs = $(parent).find('[data-toggle="tab"]');

	tabs.on('shown.bs.tab', function (e) {
		content = $(e.target.hash);

		if (content.is('*')){
			initSummernote(content);
		}

	})
}
// </ SUMMERNOTE >



// < IMAGE UPLOAD >
var initImageUpload = function(){
	if ($('.crop-thumb .crop-input').is('*')){
		$('.crop-thumb .crop-input').change(function(e){
			cropThumb = $(this).closest('.crop-thumb');
			uniqid = cropThumb.data('uniqid');
			imgsize = cropThumb.data('imageSize');
			imgsize = imgsize.split('x');
			imgWidth = parseInt(imgsize[0]);
			imgHeight = parseInt(imgsize[1]);
			//console.log(imgWidth);

			if (imgWidth == '0' || imgHeight == '0'){
				require_crop = false;
			} else {
				require_crop = true;
			}

			//var file = e.target.files[0];

			var file = new FileReader();

			file.readAsDataURL(e.target.files[0]);

			file.onload = function (fileObj) {
				if (require_crop === false){
					cropThumb.find('.thumb-img').prop('src', fileObj.target.result);
				} else {
					// cropThumb.find('.thumb-img').css('visibility','hidden');
					// cropThumb.find('.thumb-img-wrap').css('background-image','url('+fileObj.target.result+')');
					cropperUI.init(imgWidth, imgHeight, fileObj.target.result, cropThumb);
				}
				
			};
		});

		if ($('.crop-thumb .crop-btn').is('*')){
			$('.crop-thumb .crop-btn').click(function(e){
				e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();

				cropThumb = $(this).closest('.crop-thumb');
				uniqid = cropThumb.data('uniqid');
				image_size = cropThumb.data('imageSize');

				cropThumb.find('.crop-input').trigger('click');
				
				console.log('.crop-btn');
			})
		}

		if ($('.crop-thumb .thumb-img').is('*')){
			$('.crop-thumb .thumb-img').click(function(e){
				e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();

				cropThumb = $(this).closest('.crop-thumb');
				uniqid = cropThumb.data('uniqid');
				image_size = cropThumb.data('imageSize');

				cropThumb.find('.crop-input').trigger('click');
				console.log('.thumb-img');
			})
		}
	}
}
// </ IMAGE UPLOAD >

// < CROPPER UI: K99 UI for Croppie >
var cropperUIFloor = {};
var cropperObj = {};
var cropperUI = {
	init: function(imgWidth, imgHeight, imgFile, cropThumb){
		cropperFloor = $(`
			<div class="cropper-floor">
				<div class="cropper-header">
					<h4 class="text-center">
						Crop Selected Image <br />
						<small class="text-muted">
							selection is constrained to Aspect Ratio of the required size: ${imgWidth}x${imgHeight}
						</small>
					</h4>
				</div>
				<div class="cropper-body" id="cropper-body">
					<img id="cropper-img" src="${imgFile}" />
				</div>
				<div class="cropper-footer">
					<div class="mb-3">
						<div class="btn-group">
							<a href="javascript: void(0);" class="btn btn-secondary btn-cropper-zoom-in"><i class="mdi mdi-magnify-plus"></i></a>
							<a href="javascript: void(0);" class="btn btn-secondary btn-cropper-zoom-out"><i class="mdi mdi-magnify-minus"></i></a>
							<a href="javascript: void(0);" class="btn btn-secondary btn-cropper-rotate-left"><i class="mdi mdi-rotate-left"></i></a>
							<a href="javascript: void(0);" class="btn btn-secondary btn-cropper-rotate-right"><i class="mdi mdi-rotate-right"></i></a>
						</div>
					</div>
					<div>
						<a href="javascript: void(0);" class="btn btn-purple btn-rounded btn-cropper-save">Save Cropped Version</a>
						<a href="javascript: void(0);" class="btn btn-pink btn-rounded btn-cropper-dismiss">Cancel</a>
					</div>
				</div>
			</div>
		`);

		$('body').append(cropperFloor);
		cropperFloor.hide();
		
		cropperObj = new Cropper($('#cropper-img')[0], {
			viewMode: 2,
			dragMode: 'move',
			aspectRatio: imgWidth / imgHeight,
			autoCrop: true,
			autoCropArea: 1
		})
		cropperFloor.fadeIn(250);

		cropperUIFloor = cropperFloor;

		$('.btn-cropper-zoom-in').on('click', function(e){
			e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();

			cropperObj.zoom(0.1);
		})

		$('.btn-cropper-zoom-out').on('click', function(e){
			e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();

			cropperObj.zoom(-0.1);
		})

		$('.btn-cropper-rotate-left').on('click', function(e){
			e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();

			cropperObj.rotate(-90);
			cropperObj.setAspectRatio(imgWidth/imgHeight);
		})

		$('.btn-cropper-rotate-right').on('click', function(e){
			e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();

			cropperObj.rotate(90);
			cropperObj.setAspectRatio(imgWidth/imgHeight);
		})

		$('.btn-cropper-save').on('click', function(e){
			e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();
			cropdata_base64 = cropperObj.getCroppedCanvas({
				width: imgWidth,
				height: imgHeight
			}).toDataURL('image/jpeg', 0.9);

			cropThumb.find('.thumb-img').prop('src', cropdata_base64);

			fileinput = cropThumb.find('.crop-input').prop('name');
			fileinput_cropdata = fileinput + '_cropped_thumb';

			if ($('input[name='+fileinput_cropdata+']').is('*')){
				fileinput_cropdata = $('input[name='+fileinput_cropdata+']');
				fileinput_cropdata.prop('value', cropdata_base64);
			} else {
				fileinput_cropdata = $('<input type="hidden" name="'+fileinput_cropdata+'" value="'+cropdata_base64+'" />');
				cropThumb.append(fileinput_cropdata);
			}

			cropperUIFloor.fadeOut(function(){ cropperObj.destroy(); cropperUI.destroy(); });
		})

		$('.btn-cropper-dismiss').on('click', function(e){
			e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();

			cropperUIFloor.fadeOut(function(){ cropperObj.destroy(); cropperUI.destroy(); });
		})
	},
	destroy: function(){
		cropperFloor.remove();
	}
}
// </ CROPPER UI >

// < VIDEO UPLOAD >
var initVideoUpload = function(){
	if ($('.video-input').is('*')){
		$('.video-input').change(function(e){
			videoThumb = $(this).closest('.video-thumb');
			
			initWaitMe(videoThumb.closest('.card-body'), 'Loading Video Preview');

			var file = new FileReader();

			file.readAsDataURL(e.target.files[0]);

			file.onload = function (fileObj) {
				canvas = videoThumb.find('canvas')[0];
				video = videoThumb.find('video')[0];
				video.src = fileObj.target.result;
				video.play();
			};
		});
	}

	$('.video-thumb video').each(function(idx, video){ //console.log(video);
		videoThumb = $(video).closest('.video-thumb');
		canvas = videoThumb.find('canvas')[0];
		image = videoThumb.find('img')[0];
		input = videoThumb.find('.video-thumbnail-input')[0];
		
		video.addEventListener('loadeddata', function() {
			window.setTimeout(function(){
				canvas.width = video.offsetWidth;
				canvas.height = video.offsetHeight
				canvas.getContext('2d').drawImage(video, 0, 0, video.offsetWidth, video.offsetHeight);
				video.pause();
				videoThumb.closest('.card-body').waitMe('hide');
				input.value = canvas.toDataURL();
				//image.src = canvas.toDataURL(); image.classList.remove('d-none');
			}, 2500);
		}, false);
	});
}
// </ VIDEO UPLOAD >



// < WAITME >
var initWaitMe = function(element, waitMeText){
	if (waitMeText === undefined){
		waitMeText = 'Please Wait'
	}

	$(element).waitMe({
		effect : 'bounce',
		text : waitMeText,
		bg : 'rgba(255,255,255,0.7)',
		color : '#000',
		sizeW : '',
		sizeH : '',
		source : ''
	});
}
// </ WAITME >



// < DATE PICKER >
var initDatePicker = function(){
	jQuery('.datepicker').datepicker({
		format: 'yyyy-mm-dd'
	});
	
	jQuery('.datepicker-ranged').datepicker({
		format: 'yyyy-mm-dd',
		toggleActive: true
	});

	//console.log('datepicker-calendar');
	$('.datepicker-calendar').each(function(index, calendar){
		var defaultDate = undefined;

		calendarOptions = {
			format: 'yyyy-mm-dd',
			maxViewMode: 3
	    	//todayHighlight: true
		};

		if ($(calendar).data('defaultDate') !== undefined){
			defaultDate = $(calendar).data('defaultDate');
			defaultViewDate = defaultDate.split('-');
			//console.log(defaultDate);
			calendarOptions.defaultViewDate = {year: defaultViewDate[0], month: defaultViewDate[1], day: defaultViewDate[2]};
			//console.log(calendarOptions);
		}

		if ($(calendar).data('startDate') !== undefined){
			startDate = $(calendar).data('startDate');
			calendarOptions.startDate = startDate;
			//console.log(calendarOptions);
		}

		if (defaultDate !== undefined){ //alert(defaultDate);
			$(calendar).datepicker(calendarOptions).datepicker('update', defaultDate);
		} else {
			$(calendar).datepicker(calendarOptions);
		}

		$(calendar).on('changeDate', function() { //alert($(this).datepicker('getFormattedDate'));
			$(this).siblings('.datepicker-input').val(
				$(this).datepicker('getFormattedDate')
			);
		});

		$(calendar).trigger('changeDate');
	})
}
// </ DATE PICKER >



// < AJAX CRUD >
var ajaxCRUD = {
	submitData: [
		{ name:'is_ajax', value:1 }, 
		{ name:'is_submit', value:1 }
	],

	events: function(modalId){
		//console.log('ajaxCRUD.events');
		Holder.run();
		initDatePicker();
		initImageUpload();
		initVideoUpload();
		initSummernote(modalId);
		initSummernoteOnTabs(modalId);
		$(modalId).find('form textarea, form input').first().focus();
	},

	init: function(){
		this.initButton('.btn-ajax');
		this.initCheckbox('.toggle-ajax');
		this.initSaveButton('.btn-save');
	},

		initButton: function(buttonEl){
			$(buttonEl).click(function(e){
				e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();
				
				if ($(this).data('url') !== undefined)
					url = $(this).data('url');
				else
					url = $(this).prop('href');

				if (url != current_url+'#'){
					module = page_name;
				}

				//console.log(url);

				if ($(this).data('module') !== undefined)
					module = $(this).data('module');

				//console.log(module);

					//initWaitMe($('body'));
					
				ajaxCRUD.popModal(url, module);
			})
		},

		initSaveButton: function(buttonEL){
			$(buttonEL).click(function(e){
				e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();

				url = $(this).closest('.form-save').data('url');

				var fD = new FormData();

				fD.append("is_ajax", "1");
				fD.append("is_submit", "1");

				fields = $(this).closest('.form-save').find('.input-save');
				fields.each(function(){
					field_name = $(this).prop('name');
					field_value = $(this).prop('value')

					if ($(this).prop('type') == 'file'){
						field_value = $(this)[0].files[0]	
					}

					fD.append(field_name, field_value);
				})

				section = $(this).closest('.form-save');//.parent();
				initWaitMe(section);

				$.ajax({ url: url, dataType: 'html', data: fD, processData: false, contentType: false, method: 'POST' }).done(function(html){
					section.waitMe('hide');

					if (html == 'success'){
						//initWaitMe($('body'));
						//window.location.s(true);
					} else {
						try {
							response = $.parseJSON(html);
						} catch(e){
							response = '';
						}
						//console.log(typeof response);
						if (typeof response == 'object'){
							ajaxCRUD.responseAction(response);
						} else {
							//initWaitMe($('body'));
							//window.location.reload(true);
						}
					}
				});
			})
		},

		initCheckbox: function(checkboxEl){
			$(checkboxEl).change(function(e){
				e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();

				section = $(this).closest('.card');

				initWaitMe(section);

				url = $(this).data('url');

				field_name = $(this).prop('name');

				if (this.checked)
					field_value = $(this).prop('value')
				else
					field_value = '0';

				var fD = new FormData();
				fD.append(field_name, field_value);
				fD.append("is_ajax", "1");
				fD.append("is_submit", "1");

				$.ajax({ url: url, dataType: 'html', data: fD, processData: false, contentType: false, method: 'POST' }).done(function(html){
					if (html == 'success'){
						window.setTimeout(function(){
							section.waitMe('hide');
						}, 500);
					}
				});
			})
		},

	popModal: function(url, module, css_class){
		css_class = css_class || ''; //alert(css_class);
		modalId = '#modal-'+module; //alert(modalId);

		if ($(modalId).is('*') !== false){
			$(modalId).remove();
		}

		if ($(modalId).is('*') === false){

			popModalData = {
				'is_ajax': 1
			};
			
			$.ajax({ url: url, dataType: 'html', data: popModalData, method: 'POST' }).done(function(html){
				if (html == 'success'){
					$(modalId).modal('hide');
				} else {
					//ajaxCRUD.populateModal(modalId, html);
					ajaxCRUD.populateModal(modalId, html, css_class);
				}

				$('body').waitMe('hide');
			});
		}
	},

		populateModal: function(modalId, html, css_class){
			css_class = css_class || '';
			$(modalId).addClass(css_class);

			$('body').append(html);

			$(modalId).modal();
			
			$(modalId).on('hidden.bs.modal', function(e){
				if ($('.modal').hasClass('show')) {
					$('body').addClass('modal-open');
				} else {
					
				}

				$(this).remove();
			}).on('shown.bs.modal', function(e){				
				ajaxCRUD.events($(modalId));
			});

			$(modalId).find('.btn-ajax').data('modalId', modalId);
			$(modalId).find('.btn-submit').data('modalId', modalId);
			$(modalId).find('.btn-cancel').data('modalId', modalId);

			$(modalId).find('.media-row .media-card').click(function(e){
				e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();
				media_url = $(this).data('url');
				media_filename = $(this).data('filename');
				media_is_image = $(this).data('isImage');

				if (media_is_image == '1'){
					mediaManager.context.invoke('editor.insertImage', media_url, media_filename);
				} else {
					mediaManager.context.invoke('editor.pasteHTML', '<a href="'+media_url+'">'+media_filename+'</a>');
				}

				$(modalId).modal('hide');
			})

			$(modalId).find('.btn-ajax').click(function(e){
				e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();
				modalId = $(this).data('modalId');
				
				$.ajax({ url: $(this).prop('href'), dataType: 'html', method: 'POST' }).always(function(html){
					ajaxCRUD.postDataAction(html, modalId);
				});

				initWaitMe($(modalId).find('.modal-content'));
			})

			$(modalId).find('.btn-submit').click(function(e){
				e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();
				modalId = $(this).data('modalId');
				ajaxCRUD.postData($(modalId).find('form'), modalId);

				initWaitMe($(modalId).find('.modal-content'));
			})
			
			$(modalId).find('.btn-cancel').click(function(e){
				e.preventDefault(); e.stopPropagation(); e.stopImmediatePropagation();
				modalId = $(this).data('modalId');
				$(modalId).modal('hide');
			});

			//ajaxCRUD.events();
		},

	postData: function(form, modalId){
		url = form.prop('action');
		var fD = new FormData(form[0]);
		fD.append("is_ajax", "1");
		fD.append("is_submit", "1");

		//formData = formData.concat(ajaxCRUD.submitData);

		//console.log(url);
		//console.log(formData);

		$.ajax({ url: url, dataType: 'html', data: fD, processData: false, contentType: false, method: 'POST' }).always(function(html){
			ajaxCRUD.postDataAction(html, modalId);
		});
	},

	postDataAction: function(html, modalId){
		$(modalId).on('hidden.bs.modal', function(e){
			//console.log('html = '+html);

			if (html == 'success'){
				initWaitMe($('body'));
				window.location.reload(true);
			} else {
				//console.log(html);
				try {
					response = $.parseJSON(html);
				} catch(e){
					response = '';
				}
				//console.log(typeof response);
				//console.log(response);
				if (typeof response == 'object'){
					ajaxCRUD.responseAction(response);
				} else {
					//console.log('html populateModal');
					ajaxCRUD.populateModal(modalId, html);
				}
			}
		});

		$(modalId).modal('hide');
	},

	responseAction: function(response){
		if ('mediamanager' in response){
			//console.log(mediaManager.context);
			initWaitMe(mediaManager.context);
		}
		
		if ('container' in response){
			initWaitMe($(response.container));
			
			if ('html' in response){
				window.setTimeout(function(){
					console.log('response.container.html');
					$(response.container).html(response.html);
					ajaxCRUD.init();
				}, 500);
			}

			if ('remove' in response){
				window.setTimeout(function(){
					$(response.remove).remove();
					$(response.container).waitMe('hide');
				}, 500);
			}

			if ('propName' in response && 'propValue' in response){
				window.setTimeout(function(){
					$(response.container).prop(response.propName, response.propValue);
				}, 500);
			}
		}

		if ('redirect' in response){
			location.href = response.redirect;
		}
	}
}
// </ AJAX CRUD >