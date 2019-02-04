<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly. ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>"/>
        <title><?php _e('Insert Gist API shortcode', 'ap-gist-api-ci'); ?></title>
        <script src="<?php echo includes_url('js/jquery/jquery.js'); ?>" type="text/javascript"></script>
        <script src="<?php echo includes_url('js/tinymce/tiny_mce_popup.js'); ?>" type="text/javascript"></script>
        <script>
            jQuery(document).ready(function ($) {



                var ApGistApi = {
                    e: '',
                    init: function (e) {
                        ApGistApi.e = e;
                        tinyMCEPopup.resizeToInnerSize();
                    },
                    insert: function createApCiShortcode(e) {
                        var form = $('#ap_gist_api_form');
                        var id = form.find('#id').val();
                        var file_name = form.find('#file_name').val();
                        var raw = form.find('#raw').val();

                        var output = '[apCI';

                        if (id) {
                            output += ' id="' + id + '"';
                        }

                        if (file_name) {
                            output += ' file="' + file_name + '"';
                        }

                        output += ' raw="' + raw + '"';

                        output += ']';

                        tinyMCEPopup.execCommand('mceReplaceContent', false, output);
                        tinyMCEPopup.close();
                    }
                };
                tinyMCEPopup.onInit.add(ApGistApi.init, ApGistApi);

                $('#ap_gist_api_form').on('submit', function (e) {
                    var id_field = $(this).find('#id');

                    id_field.removeClass('invalid');
                    $(this).find('label.invalid').remove();

                    if (id_field.val() == '') {
                        e.preventDefault();
                        id_field.addClass('invalid');
                        id_field.after('<label class="invalid" style="display: block;"><?php _e("Required Field!", "ap-gist-api-ci"); ?></label>');
                    } else {
                        ApGistApi.insert(ApGistApi.e);
                    }
                });

            });
        </script>
    </head>
    <body>
        <form id="ap_gist_api_form" action="#">
            <p>
                <label for="id"><?php _e('Gist ID', 'ap-gist-api-ci'); ?>:</label><br/>
                <input id="id" type="text" value=""/>
            </p>
            <p>
                <label for="file_name"><?php _e('File name', 'ap-gist-api-ci'); ?>:</label><br/>
                <input id="file_name" type="text" value=""/>
            </p>
            <p>
                <label for="raw"><?php _e('Raw file link', 'ap-gist-api-ci'); ?>:</label><br/>
                <select id="raw">
                    <option value="yes" selected="selected"><?php _e('Yes', 'ap-gist-api-ci'); ?></option>
                    <option value="no"><?php _e('No', 'ap-gist-api-ci'); ?></option>
                </select>
            </p>
            <p>
                <input type="submit" id="insert" value="<?php _e('Insert shortcode', 'ap-gist-api-ci'); ?>"/>
            </p>
        </form>
    </body>
</html>
