/*-------------------------------------------------------*\
							Forms
\*-------------------------------------------------------*/	
;

// Home pages: 
//		placeholder - http://matoilic.github.io/jquery.placeholder/
//		maskedinput - http://digitalbush.com/projects/masked-input-plugin/
//		validate    - http://jqueryvalidation.org/

// Required plugins
	require('../plugins/jquery.placeholder.js');
	require('../plugins/jquery.maskedinput.js');
	require('../plugins/jquery.validate.min.js');

// Initialization
	$(document).ready(function() {
		/******************************************
		 * Input placeholders in IE
		 */
			$('input, textarea').placeholder();

		/******************************************
		 * Phone masks
		 */
			$.mask.definitions['~']="[+-]";
			$(".phone").mask("+7(999) 999-9999");

		/******************************************
		 * Main form validation
		 */
			$("#js-form-1").validate({
				rules:{
					Name:{
						required:true,
						minlength:2,
						maxlength:100,
					},
					Email:{
						required:true,
						minlength:2,
						maxlength:100,
					},
					Phone:{
						required:true,
						minlength:2,
						maxlength:100,
					}
				},
				messages:{
					Name:{
						required:"Поле обязательно для заполнения!",
						minlength:"Поле не должно содержать менее 2-х символов",
						maxlength:"",
					},
					Email:{
						required:"Поле обязательно для заполнения!",
						minlength:"Поле не должно содержать менее 2-х символов",
						maxlength:"",
					},
					Phone:{
						required:"Поле обязательно для заполнения!",
						minlength:"Поле не должно содержать менее 2-х символов",
						maxlength:"",
					}
				}
			});

			$("#js-form-2").validate({
				rules:{
					Name:{
						required:true,
						minlength:2,
						maxlength:100,
					},
					Email:{
						required:true,
						minlength:2,
						maxlength:100,
					},
					Phone:{
						required:true,
						minlength:2,
						maxlength:100,
					}
				},
				messages:{
					Name:{
						required:"Поле обязательно для заполнения!",
						minlength:"Поле не должно содержать менее 2-х символов",
						maxlength:"",
					},
					Email:{
						required:"Поле обязательно для заполнения!",
						minlength:"Поле не должно содержать менее 2-х символов",
						maxlength:"",
					},
					Phone:{
						required:"Поле обязательно для заполнения!",
						minlength:"Поле не должно содержать менее 2-х символов",
						maxlength:"",
					}
				}
			});

			$("#js-form-3").validate({
				rules:{
					Name:{
						required:true,
						minlength:2,
						maxlength:100,
					},
					Email:{
						required:true,
						minlength:2,
						maxlength:100,
					},
					Phone:{
						required:true,
						minlength:2,
						maxlength:100,
					}
				},
				messages:{
					Name:{
						required:"Поле обязательно для заполнения!",
						minlength:"Поле не должно содержать менее 2-х символов",
						maxlength:"",
					},
					Email:{
						required:"Поле обязательно для заполнения!",
						minlength:"Поле не должно содержать менее 2-х символов",
						maxlength:"",
					},
					Phone:{
						required:"Поле обязательно для заполнения!",
						minlength:"Поле не должно содержать менее 2-х символов",
						maxlength:"",
					}
				}
			});

			$("#js-form-modal").validate({
				rules:{
					Name:{
						required:true,
						minlength:2,
						maxlength:100,
					},
					Email:{
						required:true,
						minlength:2,
						maxlength:100,
					},
					Phone:{
						required:true,
						minlength:2,
						maxlength:100,
					}
				},
				messages:{
					Name:{
						required:"Поле обязательно для заполнения!",
						minlength:"Поле не должно содержать менее 2-х символов",
						maxlength:"",
					},
					Email:{
						required:"Поле обязательно для заполнения!",
						minlength:"Поле не должно содержать менее 2-х символов",
						maxlength:"",
					},
					Phone:{
						required:"Поле обязательно для заполнения!",
						minlength:"Поле не должно содержать менее 2-х символов",
						maxlength:"",
					}
				}
			});

	}); //forms



		

		