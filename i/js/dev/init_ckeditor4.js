    $(document).ready(function()
    {
        if(typeof CKEDITOR != 'undefined')
        {
            CKEDITOR.disableAutoInline = true;

            $(".js-ckeditor4").each(function()
            {
                $(this).attr("contentEditable", 'true'); // иначе панелька будет в режиме readonly        
                var config = 
                {
                    scayt_autoStartup:    false, // включаем проверку орфографии по умолчанию
                    autoGrow_onStartup:   true, // Whether to have the auto grow happen on editor creation.                                                                                                                    
                    filebrowserUploadUrl: "/?q=admin/ckeditor4_uploader", // The location of the script that handles file uploads. If set, the Upload tab will appear in the Link, Image, and Flash dialog windows.
                
                    readOnly: false,
                };
                if (typeof g_ckeditor4_contentCss !== "undefined" && g_ckeditor4_contentCss != "")
                {
                    config.contentsCss = g_ckeditor4_contentCss; // Подменяем css файл чтобы всё было в стилистике сайта
                }
                if ($(this).attr("mode") == "short")
                {
                    config.height = '600px';
                    config.toolbarGroups = 
                    [
                        { name: 'clipboard',   groups: [ 'undo' ] },
                        { name: 'basicstyles', groups: [ 'basicstyles' ] },
                        '/',
                        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
                        { name: 'links'  },
                    ];
                }
                else
                {
                    config.height = '600px';
                    config.toolbar = 
                    [
                        { name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
                        { name: 'editing', items: [ 'Scayt' ] },
                        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
                        { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
                        { name: 'tools', items: [ 'Maximize' ] },
                        { name: 'document', items: [ 'Source' ] },

                        '/',
                        { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
                        { name: 'paragraph1', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                        { name: 'styles', items: [ 'Styles', "FontSize" ] },
                        '/',

                        { name: 'document', groups: [ 'mode', 'document','doctools' ],  items:  [ 'Save', 'NewPage','Preview','Print','-','Templates'] },

                        { 
                            name: 'insert',
                            items: 
                            [
                                'Image', 
                                'Flash', 
                                'Table', 
                                'HorizontalRule', 
                                'Smiley',
                                'SpecialChar', 
                                'PageBreak',
                                "InsertPre",
                                'Iframe',
                                'CreateDiv',
                                'Youtube'
                            ] 
                        },
                    ];
                }
                var id = $(this).attr("id");
                if (!CKEDITOR.dom.element.get(id).getEditor())
                {
                    CKEDITOR.replace(id, config);
                }
            });
        }
    });
