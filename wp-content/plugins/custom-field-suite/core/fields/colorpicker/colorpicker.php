<?php

class cfs_Colorpicker extends cfs_Field
{

    function __construct($parent)
    {
        $this->name = 'colorpicker';
        $this->label = __('Colorpicker', 'cfs');
        $this->parent = $parent;
    }

    function html($field)
    {
    ?>
        <input name="<?php echo $field->input_name; ?>" class="color" value="<?php echo $field->value; ?>">
    <?php
    }

    function input_head()
    {
    ?>
        <script type="text/javascript" src="<?php echo $this->parent->url; ?>/core/fields/colorpicker/jscolor.js"></script>
    <?php
    }

}
