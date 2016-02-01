<?php
if (!empty($formActionUri)):
    $formAttributes['action'] = $formActionUri;
else:
    $formAttributes['action'] = url(array('controller'=>'items',
                                          'action'=>'browse'));
endif;
$formAttributes['method'] = 'GET';
?>

<form <?php echo tag_attributes($formAttributes); ?>>
    <div class="form">
        <div id="search-keywords" class="field form-group">
            <?php echo $this->formLabel('keyword-search', __('Search for Keywords')); ?>
            <div class="inputs ">
            <?php
                echo $this->formText(
                    'search',
                    @$_REQUEST['search'],
                    array('id' => 'keyword-search', 'size' => '40', 'class' => 'form-control')
                );
            ?>
            </div>
        </div>
        <div class="field form-group">
            <label class="control-label"><?php echo __('Narrow results by the value of specific database attributes'); ?></label>
        </div>
    </div>
    <div class="form-inline">
      <div id="search-narrow-by-fields" class="field form-group">
        
        <div class="inputs">
        <?php
        // If the form has been submitted, retain the number of search
        // fields used and rebuild the form
        if (!empty($_GET['advanced'])) {
            $search = $_GET['advanced'];
        } else {
            $search = array(array('field'=>'','type'=>'','value'=>'', 'class' => 'form-control'));
        }

        //Here is where we actually build the search form
        foreach ($search as $i => $rows): ?>
            <div class="search-entry form-group">
                <?php
                //The POST looks like =>
                // advanced[0] =>
                //[field] = 'description'
                //[type] = 'contains'
                //[terms] = 'foobar'
                //etc
                echo $this->formSelect(
                    "advanced[$i][element_id]",
                    @$rows['element_id'],
                    array(
                        'title' => __("Search Field"),
                        'id' => null,
                        'class' => 'advanced-search-element form-control'
                    ),
                    get_table_options('Element', null, array(
                        'record_types' => array('Item', 'All'),
                        'sort' => 'orderBySet')
                    )
                );
                echo $this->formSelect(
                    "advanced[$i][type]",
                    @$rows['type'],
                    array(
                        'title' => __("Search Type"),
                        'id' => null,
                        'class' => 'advanced-search-type form-control'
                    ),
                    label_table_options(array(
                        'contains' => __('contains'),
                        'does not contain' => __('does not contain'),
                        'is exactly' => __('is exactly'),
                        'is empty' => __('is empty'),
                        'is not empty' => __('is not empty'))
                    )
                );
                echo $this->formText(
                    "advanced[$i][terms]",
                    @$rows['terms'],
                    array(
                        'size' => '20',
                        'title' => __("Search Terms"),
                        'id' => null,
                        'class' => 'advanced-search-terms form-control'
                    )
                );
                ?>
                <button type="button" class="remove_search" disabled="disabled" style="display: none;"><?php echo __('Remove field'); ?></button>
            </div>
        <?php endforeach; ?>

        </div>
        <button type="button" class="add_search"><?php echo __('Add a Field'); ?></button>
    </div>
    </div>

    <div class="form">
    <div id="search-by-range" class="field form-group">
        <?php echo $this->formLabel('range', __('Search by a range of ID#s (example: 1-4, 156, 79)')); ?>
        <div class="inputs">
        <?php
            echo $this->formText('range', @$_GET['range'],
                array('size' => '40','class' => 'form-control')
            );
        ?>
        </div>
    </div>

    <div class="field form-group">
        <?php echo $this->formLabel('collection-search', __('Search By Collection')); ?>
        <div class="inputs">
        <?php
            echo $this->formSelect(
                'collection',
                @$_REQUEST['collection'],
                array('id' => 'collection-search','class' => 'form-control'),
                get_table_options('Collection')
            );
        ?>
        </div>
    </div>

    <div class="field form-group">
        <?php echo $this->formLabel('item-type-search', __('Search By Type')); ?>
        <div class="inputs">
        <?php
            echo $this->formSelect(
                'type',
                @$_REQUEST['type'],
                array('id' => 'item-type-search','class' => 'form-control'),
                get_table_options('ItemType')
            );
        ?>
        </div>
    </div>

    <?php if(is_allowed('Users', 'browse')): ?>
    <div class="field form-group">
    <?php
        echo $this->formLabel('user-search', __('Search By User'));?>
        <div class="inputs">
        <?php
            echo $this->formSelect(
                'user',
                @$_REQUEST['user'],
                array('id' => 'user-search','class' => 'form-control'),
                get_table_options('User')
            );
        ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="field form-group">
        <?php echo $this->formLabel('tag-search', __('Search By Tags')); ?>
        <div class="inputs">
        <?php
            echo $this->formText('tags', @$_REQUEST['tags'],
                array('size' => '40', 'id' => 'tag-search','class' => 'form-control')
            );
        ?>
        </div>
    </div>


    <?php if (is_allowed('Items','showNotPublic')): ?>
    <div class="field form-group">
        <?php echo $this->formLabel('public', __('Public/Non-Public')); ?>
        <div class="inputs">
        <?php
            echo $this->formSelect(
                'public',
                @$_REQUEST['public'],
                array('class' => 'form-control'),
                label_table_options(array(
                    '1' => __('Only Public Items'),
                    '0' => __('Only Non-Public Items')
                ))
            );
        ?>
        </div>
    </div>
    <?php endif; ?>

    <div class="field form-group">
        <?php echo $this->formLabel('featured', __('Featured/Non-Featured')); ?>
        <div class="inputs">
        <?php
            echo $this->formSelect(
                'featured',
                @$_REQUEST['featured'],
                array('class' => 'form-control'),
                label_table_options(array(
                    '1' => __('Only Featured Items'),
                    '0' => __('Only Non-Featured Items')
                ))
            );
        ?>
        </div>
    </div>
    <div class="field form-group">
        <?php fire_plugin_hook('public_items_search', array('view' => $this)); ?>
    </div>
    <div>
        <?php if (!isset($buttonText)) $buttonText = __('Search for items'); ?>
        <input type="submit" class="submit btn btn-default" name="submit_search" id="submit_search_advanced" value="<?php echo $buttonText ?>">
    </div>
    </div>
</form>

<?php echo js_tag('items-search'); ?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        Omeka.Search.activateSearchButtons();
    });
</script>
