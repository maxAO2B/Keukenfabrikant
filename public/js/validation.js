$('#validation').bootstrapValidator({
    feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
    },
    fields: {
        first: {
            validators: {
                stringLength: {
                    min: 2,
                    max: 30,
                    message: 'Dit veld moet minstens 2 karakters bevatten'
                },
                notEmpty: {
                    message: 'Vul een voornaam in'
                }
            }
        },
        last: {
            validators: {
                stringLength: {
                    min: 2,
                    max: 30,
                    message: ''
                },
                notEmpty: {
                    message: 'Please Enter your phone number'
                }
            }
        },
        address: {
            validators: {
                stringLength: {
                    min: 15,
                    max: 100,
                    message:'Please enter at least 15 characters and no more than 100'
                },
                notEmpty: {
                    message: 'Please Enter Address'
                }
            }
        },
        gender: {
            validators: {
                notEmpty: {
                    message: 'The gender option is required'
                }
            }
        },
        email: {
            validators: {
                notEmpty: {
                    message: 'Please Enter your email address'
                },
                emailAddress: {
                    message: 'Please Enter a valid email address'
                }
            }
        },

        confirmEmail: {
            validators: {
                notEmpty: {
                    message: 'Vul je e-mail adress in'
                },
                identical: {
                    field: 'email',
                    message: 'Het e-mail adress komt niet overeen'
                }
            }
         },

        
        password: {
            validators: {
                notEmpty: {
                    message: 'Enter your profile password'
                }
            }
        },
        confirmPassword: {
            validators: {
                notEmpty: {
                    message: 'Enter confirm your profile password'
                },
                identical: {
                    field: 'password',
                    message: 'Enter the password, what enter in password field'
                }
            }
         },
         'lang_known[]': {
            validators: {
                notEmpty: {
                    message: 'The Language Known is required'
                }
            }
        },
        role: {
            validators: {
                notEmpty: {
                    message: 'Choose your user role'
                }
            }
        },
        
        }
    });