// Ensure no conflicts with other libraries using the $ alias
var $ = jQuery.noConflict();
var imageField, imagePreview, ImageContainer;
$(document).ready(function() {
    // Enable sortable functionality for repeater items
    $(".heystudio_repeater_table_body").sortable({
        items: '.heystudio_repeater_item',
        handle: '.heystudio_repeater_item_index',
        helper: function(e, tr) {
            var $originals = tr.children();
            var $helper = tr.clone();
            $helper.children().each(function(index) {
                $(this).width($originals.eq(index).width());
            });
            return $helper;
        },
        stop: function(event, ui) {
            updateRepeater(ui.item);
        }
    });
    $(".heystudio_flexible_content_table_body").sortable({
        items: '.heystudio_flexible_content_item',
        handle: '.heystudio_flexible_content_item_index',
        helper: function(e, tr) {
            var $originals = tr.children();
            var $helper = tr.clone();
            $helper.children().each(function(index) {
                $(this).width($originals.eq(index).width());
            });
            return $helper;
        },
        stop: function(event, ui) {
            updateFlexibleContentIndexes(ui.item.parents('.heystudio_flexible_content_table_body'));
        }
    });

    // Handle sorting of meta boxes
    $(document).on('sortstop', '.meta-box-sortables', function(event, ui) {
        updateRepeaterMetabox(ui.item);
    });
    $('.input.heystudio_field[type="url"]')
});
/**
 * Initializes the about fields with the given editor count.
 * @param {number} editorCount - The initial count of editors.
 */
function init_about_fields(editorCount) {
    // Initialize existing editors once the window is loaded
    $(window).on('load', function() {
        setTimeout(function() {
            for (let i = 0; i < editorCount; i++) {
                initTiny('#heystudio-editor-' + i)
            }
        }, 100);
    });

    // Add a new repeater item on button click
    $('#heystudio_add_item').on('click', function(e) {
        e.preventDefault();
        addAboutRepeaterItem(editorCount);
        editorCount++;
    });

    // Remove a repeater item on button click
    $('body').on('click', '.heystudio_remove_item', function(e) {
        // Display a confirmation dialog
        const isConfirmed = window.confirm("Are you sure you want to remove this item?");

        // If the user clicks "OK", proceed with the removal
        if (isConfirmed) {
            $(this).parents('.heystudio_repeater_item').find('.heystudio_editor').each(function() {
                var editorId = $(this).attr('id');
                tinymce.get(editorId).remove();
            });
            $(this).closest('.heystudio_repeater_item').remove();
            updateRepeaterIndexes($(this).parents('.heystudio_repeater_item').parents('.heystudio_repeater_table_body'));
        }
    });
}
/**
 * Initializes the projects fields with the given editor count.
 * @param {number} editorCount - The initial count of editors.
 */
function init_projects_fields() {
    $(window).on('load', function() {
        initTiny('#heystudio_colored_text');
        initTiny('#heystudio_content');
    });
    // Instantiates the variable that holds the media library frame.
    var meta_image_frame;
    // Image
    $('body').on('click', ".heystudio_upload_image_btn", function(e) {
        e.preventDefault();
        ImageContainer = $(this).parents('.heystudio_image_field_content');

        imageField = ImageContainer.find(".heystudio_image");
        imagePreview = ImageContainer.find(".heystudio_image_preview");
        // If the frame already exists, reopen it.
        if (meta_image_frame) {
            meta_image_frame.open();
            return;
        }
        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
            title: "Choose or Upload an Image",
            button: {
                text: "Use this image",
            },
            library: {
                type: "image"
            },
        });
        // Runs when an image is selected.
        meta_image_frame.on("select", function() {
            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = meta_image_frame.state().get("selection").first().toJSON();

            // Sends the attachment URL to our custom image input field.
            ImageContainer.find('.heystudio_image_field_container').addClass('has_image');
            imageField.val(media_attachment.id);
            imagePreview.attr("src", media_attachment.url);

        });
        // Opens the media library frame.
        meta_image_frame.open();
    });
    $('body').on('click', '.heystudio_remove_image_btn', function(e) {
        e.preventDefault();
        var container = $(this).parents('.heystudio_image_field_content');
        var imageField, imagePreview;
        imageField = container.find(".heystudio_image");
        imagePreview = container.find(".heystudio_image_preview");
        container.find('.heystudio_image_field_container').removeClass('has_image');
        imageField.val('');
        imagePreview.attr("src", '');

    });

    var setCount = flexible_content_count;

    $('#add_images_btn').click(function() {
        var numberOfImages = $('#number_of_images').val();
        const index = $('.heystudio_about_flexible_content_container .heystudio_flexible_content_item').length + 1;
        var setHtml = '<div class="heystudio_flexible_content_item flexible_content_row">';
        setHtml += '<div class="heystudio_flexible_content_item_index flexible_content_cell index_cell"><label>' + (index) + '</label></div>';
        setHtml += '<div class="heystudio_flexible_content_item_field flexible_content_cell field_cell">';
        setHtml += '<div class="image-set" columns="' + (numberOfImages) + '" >';
        for (let i = 1; i <= numberOfImages; i++) {
            setHtml += `
                <div class="image-set-column">
               <div class="heystudio_field_container heystudio_image_field_content">
					    <input class="heystudio_image" type="hidden"name="project_image_sets[${setCount}][images][${i}][image]" value="">
						<div class="heystudio_image_field_container">
					    <img class="heystudio_image_preview" src="" />
					    <button class="button heystudio_upload_image_btn" type="button" title="Upload Image">Upload Image</button>
						 <button class="button heystudio_remove_image_btn" type="button" title="Remove">X</button>
					 	</div>
					 	</div>
					 	<div class="heystudio_field_container">
					    <label>Video Url:</label>
					    <input type="url" class="heystudio_field" name="project_image_sets[${setCount}][images][${i}][video_url]" value="">
						</div>
						</div>
            `;
        }
        setHtml += '</div>';
        setHtml += '</div>';
        setHtml += '<div class="heystudio_flexible_content_item_actions flexible_content_cell action_cell">';
        setHtml += '<button type="button" class="button remove_set_btn">Remove</button>';
        setHtml += '</div>';
        setHtml += '</div>';

        $('.heystudio_flexible_content_table_body').append(setHtml);
        setCount++;

        updateFlexibleContentIndexes($('.heystudio_flexible_content_table_body'));
    });
    $('.heystudio_flexible_content_table_body').on('click', '.upload_image_btn', function() {
        open_media_uploader_image(this);
    });

    $('.heystudio_flexible_content_table_body').on('click', '.remove_set_btn', function() {
        // Display a confirmation dialog
        const isConfirmed = window.confirm("Are you sure you want to remove this item?");

        // If the user clicks "OK", proceed with the removal
        if (isConfirmed) {
            $(this).closest('.heystudio_flexible_content_item').remove();
            updateFlexibleContentIndexes($(this).parents('.heystudio_flexible_content_table_body'));
        }
    });

}
/**
 * Initializes the contact fields with the given editor count.
 * @param {number} editorCount - The initial count of editors.
 */
function init_contact_fields(editorCount1, editorCount2) {

    // Initialize existing editors once the window is loaded
    $(window).on('load', function() {
        for (var i = 0; i < editorCount1; i++) {
            initTiny('#heystudio-contact-column1-' + i);
            initTiny('#heystudio-contact-column2-' + i);
        }
    });

    // Add a new repeater item on button click
    $('#heystudio_add_contact_item').on('click', function(e) {
        e.preventDefault();
        addContactRepeaterItem(editorCount1, editorCount2);
        editorCount1++;
        editorCount2++;
    });

    $('body').on('click', '.heystudio_remove_contact_item', function(e) {
        // Display a confirmation dialog
        const isConfirmed = window.confirm("Are you sure you want to remove this item?");

        // If the user clicks "OK", proceed with the removal
        if (isConfirmed) {
            e.preventDefault();
            var editorId1 = $(this).prev().prev('textarea').attr('id');
            var editorId2 = $(this).prev('textarea').attr('id');
            $(this).parents('.heystudio_repeater_item').find('.heystudio_editor').each(function() {
                var editorId = $(this).attr('id');
                tinymce.get(editorId).remove();
            });
            $(this).closest('.heystudio_repeater_item').remove();
            updateRepeaterIndexes($(this).closest('.heystudio_repeater_item').parents('.heystudio_repeater_table_body'));
        }
    });
}

function init_news_fields(items_count) {
    // Add a new repeater item on button click
    $('#heystudio_add_news_item').on('click', function(e) {
        e.preventDefault();
        addNewsRepeaterItem(items_count);
        items_count++;
    });
    // Instantiates the variable that holds the media library frame.
    var meta_image_frame;
    // Image
    $('body').on('click', ".heystudio_upload_image_btn", function(e) {
        e.preventDefault();
        ImageContainer = $(this).parents('.heystudio_image_field_content');

        imageField = ImageContainer.find(".heystudio_image");
        imagePreview = ImageContainer.find(".heystudio_image_preview");
        // If the frame already exists, reopen it.
        if (meta_image_frame) {
            meta_image_frame.open();
            return;
        }
        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
            title: "Choose or Upload an Image",
            button: {
                text: "Use this image",
            },
            library: {
                type: "image"
            },
        });
        // Runs when an image is selected.
        meta_image_frame.on("select", function() {
            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = meta_image_frame.state().get("selection").first().toJSON();

            // Sends the attachment URL to our custom image input field.
            ImageContainer.find('.heystudio_image_field_container').addClass('has_image');
            imageField.val(media_attachment.id);
            imagePreview.attr("src", media_attachment.url);

        });
        // Opens the media library frame.
        meta_image_frame.open();
    });
    $('body').on('click', '.heystudio_remove_image_btn', function(e) {
        e.preventDefault();
        var container = $(this).parents('.heystudio_image_field_content');
        var imageField, imagePreview;
        imageField = container.find(".heystudio_image");
        imagePreview = container.find(".heystudio_image_preview");
        container.find('.heystudio_image_field_container').removeClass('has_image');
        imageField.val('');
        imagePreview.attr("src", '');

    });
    // Remove a repeater item on button click
    $('body').on('click', '.heystudio_remove_news_item', function(e) {
        // Display a confirmation dialog
        const isConfirmed = window.confirm("Are you sure you want to remove this item?");

        // If the user clicks "OK", proceed with the removal
        if (isConfirmed) {
            $(this).parents('.heystudio_repeater_item').find('.heystudio_editor').each(function() {
                var editorId = $(this).attr('id');
                tinymce.get(editorId).remove();
            });
            $(this).closest('.heystudio_repeater_item').remove();
            updateRepeaterIndexes($(this).parents('.heystudio_repeater_item').parents('.heystudio_repeater_table_body'));
        }
    });
}

function addNewsRepeaterItem(items_count) {
    const index = $('.heystudio_news_repeater_container .heystudio_repeater_item').length + 1;
    const newItem = `
        <div class="heystudio_repeater_item repeater_row">
            <div class="heystudio_repeater_item_index repeater_cell index_cell"><label>${index}</label></div>
              <div class="heystudio_repeater_item_field repeater_cell field_cell">
                         <div class="heystudio_field_container heystudio_image_field_content">
					    <input class="heystudio_image" type="hidden" name="heystudio_news_fields[${items_count}][image]" >
						<div class="heystudio_image_field_container ">
					    <img class="heystudio_image_preview" src="" />
					    <button class="button heystudio_upload_image_btn" type="button" title="Upload Image">Upload Image</button>
						<button class="button heystudio_remove_image_btn" type="button" title="Remove">X</button>
					 	</div>
					 	</div>
                </div>

            <div class="heystudio_repeater_item_field repeater_cell field_cell">
                <textarea class="heystudio_input" name="heystudio_news_fields[${items_count}][title]" ></textarea>
            </div>
            <div class="heystudio_repeater_item_field repeater_cell field_cell">
                <input type="url" class="heystudio_input" name="heystudio_news_fields[${items_count}][url]" >
            </div>
            <div class="heystudio_repeater_item_actions repeater_cell action_cell">
                <button class="button heystudio_remove_news_item">Remove</button>
                            </div>
        </div>`;
    $('.heystudio_news_repeater_container .heystudio_repeater_table_body').append(newItem);
}

/**
 * Adds a new repeater item to the container.
 * @param {number} editorCount - The current count of editors.
 */
function addAboutRepeaterItem(editorCount) {
    const index = $('.heystudio_about_repeater_container .heystudio_repeater_item').length + 1;
    const newItem = `
        <div class="heystudio_repeater_item repeater_row">
            <div class="heystudio_repeater_item_index repeater_cell index_cell"><label>${index}</label></div>
                <div class="heystudio_repeater_item_field  repeater_cell field_cell">
                    <input type="text" name="heystudio_about_title[]">
                </div>
                <div class="heystudio_repeater_item_field repeater_cell field_cell">
                    <textarea class="heystudio_editor" name="heystudio_about_text[]" id="heystudio-editor-${editorCount}" rows="12"></textarea>
                </div>
           
            <div class="heystudio_repeater_item_actions repeater_cell action_cell">
                <button class="button heystudio_remove_item">Remove</button>
            </div> 
        </div>`;
    $('.heystudio_about_repeater_container .heystudio_repeater_table_body').append(newItem);
    initTiny('#heystudio-editor-' + editorCount);
}
/**
 * Adds a new repeater item to the container.
 * @param {number} editorCount - The current count of editors.
 */
function addContactRepeaterItem(editorCount1, editorCount2) {
    const index = $('.heystudio_contact_repeater_container .heystudio_repeater_item').length + 1;
    const newItem = `
        <div class="heystudio_repeater_item repeater_row">
            <div class="heystudio_repeater_item_index repeater_cell index_cell"><label>${index}</label></div>
            		<div class="heystudio_repeater_item_field repeater_cell field_cell">
              <textarea name="contact_main_title[]" rows="3"></textarea>
                </div>
                <div class="heystudio_repeater_item_field repeater_cell field_cell">
               <textarea name="contact_column_1[]" class="heystudio_editor" id="heystudio-contact-column1-${editorCount1}" rows="12"></textarea>
                 </div>
                <div class="heystudio_repeater_item_field repeater_cell field_cell">
             <textarea name="contact_column_2[]" id="heystudio-contact-column2-${editorCount2}" class="heystudio_editor"  rows="12"></textarea>
                 </div>
              <div class="heystudio_repeater_item_actions repeater_cell action_cell">
                    	 <button class="button heystudio_remove_contact_item">Remove</button>
                    </div>
        </div>`;
    $('.heystudio_contact_repeater_container .heystudio_repeater_table_body').append(newItem);
    // Initialize the TinyMCE editor for the new textareas
    initTiny('#heystudio-contact-column1-' + editorCount1);
    initTiny('#heystudio-contact-column2-' + editorCount1);

}
/**
 * Updates the repeater after sorting.
 * @param {Object} item - The sorted item.
 */
function updateRepeater(item) {
    toggleEditors(item, 'mceRemoveEditor');
    toggleEditors(item, 'mceAddEditor');
    updateRepeaterIndexes(item.parents('.heystudio_repeater_table_body'));
}

/**
 * Toggles the TinyMCE editors based on the given command.
 * @param {Object} item - The item containing the editors.
 * @param {string} command - The command to be executed ('mceRemoveEditor' or 'mceAddEditor').
 */
function toggleEditors(item, command) {
    item.find('.heystudio_editor').each(function() {
        tinymce.EditorManager.execCommand(command, true, $(this).attr('id'));
    });
}

/**
 * Updates the indexes of the repeater items.
 * @param {Object} parent - The parent container of the repeater items.
 */
function updateRepeaterIndexes(parent) {
    parent.find(".heystudio_repeater_item").each(function(index) {
        $(this).find(".heystudio_repeater_item_index label").text(index + 1);
    });
}
function updateFlexibleContentIndexes(parent) {
    parent.find(".heystudio_flexible_content_item").each(function(index) {
        $(this).find(".heystudio_flexible_content_item_index label").text(index + 1);
    });
}
/**
 * Updates the repeater inside the metabox after sorting.
 * @param {Object} item - The sorted item inside the metabox.
 */
function updateRepeaterMetabox(item) {
    toggleEditors(item, 'mceRemoveEditor');
    toggleEditors(item, 'mceAddEditor');
}
function hideShowMetaboxes() {
    jQuery(document).ready(function($) {
        // Initial check
        updateMetaBoxVisibility();

        // Check if Gutenberg is available
        if (typeof wp !== "undefined" && wp.data && wp.data.subscribe) {
            let lastTemplate = wp.data.select('core/editor').getEditedPostAttribute('template');

            wp.data.subscribe(()=>{
                let newTemplate = wp.data.select('core/editor').getEditedPostAttribute('template');
                if (newTemplate !== lastTemplate) {
                    updateMetaBoxVisibility();
                    lastTemplate = newTemplate;
                }
            }
            );
        }

        function updateMetaBoxVisibility() {
            // Check if Gutenberg and the editor store are available
            if (typeof wp !== "undefined" && wp.data && wp.data.select('core/editor')) {
                const template = wp.data.select('core/editor').getEditedPostAttribute('template');

                if ($('#heystudio_about_meta_box')[0]) {
                    if (template === 'templates/template_about.php') {
                        $('#heystudio_about_meta_box').show();
                    } else {
                        $('#heystudio_about_meta_box').hide();
                    }
                }

                if ($('#heystudio_contact_meta_box')[0]) {
                    if (template === 'templates/template_contact.php') {
                        $('#heystudio_contact_meta_box').show();
                    } else {
                        $('#heystudio_contact_meta_box').hide();
                    }
                }
            }
        }
    });
}
function initTiny(selector) {
    setTimeout(function() {
        wp.editor.initialize($(selector).attr('id'), {
            tinymce: {
                wpautop: true,
                toolbar1: 'bold | link | undo | redo'
            },
            quicktags: false,
            mediaButtons: false
        });
    }, 100);
}
function open_media_uploader_image(element) {
    var custom_uploader;
    if (custom_uploader) {
        custom_uploader.open();
        return;
    }
    custom_uploader = wp.media.frames.file_frame = wp.media({
        title: 'Select Image',
        button: {
            text: 'Set Image'
        },
        multiple: false
    });
    custom_uploader.on('select', function() {
        var attachment = custom_uploader.state().get('selection').first().toJSON();
        $(element).prev().val(attachment.id);
        $(element).prev().prev().attr('src', attachment.url);
    });
    custom_uploader.open();
}
