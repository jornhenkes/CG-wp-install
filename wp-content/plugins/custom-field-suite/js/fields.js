(function($) {
    $(function() {
        function update_order() {
            $('.fields .field').removeClass('even');
            $('.fields .field:even').addClass('even');
        }

        update_order();

        $('ul.fields').sortable({
            items: 'ul, li',
            connectWith: 'ul.fields',
            placeholder: 'ui-sortable-placeholder',
            handle: '.field_order',
            create: function(event, ui) {
                // Append <ul> to empty loop fields
                $('ul.fields li.loop').filter(function(idx) {
                    return $(this).children('ul').length < 1;
                }).append('<ul></ul>');
            },
            update: function(event, ui) {
                update_order();
                var parent_id = ui.item.parent('li').find('.field_id').val() || 0;
                ui.item.find('.parent_id').first().val(parent_id);
            }
        });

        // Add a new field
        $('.cfs_add_field').live('click', function() {
            var html = field_clone.replace(/\[clone\]/g, '['+field_index+']');
            $('.fields').append('<li>' + html + '</li>');
            $('.fields li:last .field_label a').click();
            $('.fields li:last .field_type select').change();
            field_index = field_index + 1;
        });

        // Delete a field
        $('.cfs_delete_field').live('click', function() {
            $(this).closest('li').remove();
        });

        // Pop open the edit fields
        $('.cfs_edit_field').live('click', function() {
            var field = $(this).closest('.field');
            field.toggleClass('form_open');
            field.find('.field_form').slideToggle();
        });

        // Add or replace field_type options
        $('.field_form .field_type select').live('change', function() {
            var type = $(this).val();
            var input_name = $(this).attr('name').replace('[type]', '');
            var html = options_html[type].replace(/cfs\[fields\]\[clone\]/g, input_name);
            $(this).closest('.field').find('.field_meta .field_type').html(type);
            $(this).closest('.field').find('.field_option').remove();
            $(this).closest('.field_basics').after(html);
        });

        // Auto-populate the field name
        $('.field_form .field_label input').live('blur', function() {
            var label_text = $(this).val();
            var name = $(this).closest('tr').find('.field_name input');
            if ('' == name.val()) {
                var val = label_text.replace(/\s/g, '_');
                val = val.replace(/[^a-zA-Z0-9_]/g, '');
                name.val(val.toLowerCase());
                name.trigger('keyup');
            }
        });

        $('.field_form .field_label input').live('keyup', function() {
            var val = $(this).val();
            $(this).closest('.field').find('.field_meta .field_label a').html(val);
        });

        $('.field_form .field_name input').live('keyup', function() {
            var val = jQuery(this).val();
            $(this).closest('.field').find('.field_meta .field_name').html(val);
        });
    });
})(jQuery);
