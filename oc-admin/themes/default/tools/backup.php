<?php
    /**
     * OSClass – software for creating and publishing online classified advertising platforms
     *
     * Copyright (C) 2010 OSCLASS
     *
     * This program is free software: you can redistribute it and/or modify it under the terms
     * of the GNU Affero General Public License as published by the Free Software Foundation,
     * either version 3 of the License, or (at your option) any later version.
     *
     * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
     * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
     * See the GNU Affero General Public License for more details.
     *
     * You should have received a copy of the GNU Affero General Public
     * License along with this program. If not, see <http://www.gnu.org/licenses/>.
     */


    //customize Head
    function customHead(){
        //echo '<script type="text/javascript" src="'.osc_current_admin_theme_js_url('jquery.validate.min.js').'"></script>';
        ?>
        <script type="text/javascript">
            function submitForm(frm, type) {
                frm.action.value = 'backup-' + type ;
                frm.submit() ;
            }
        </script>
        <?php
    }
    osc_add_hook('admin_header','customHead');

    function render_offset(){
        return 'row-offset';
    }
    osc_add_hook('admin_page_header','customPageHeader');
    function customPageHeader(){ ?>
        <h1 class="dashboard"><?php _e('Backup') ; ?></h1>
    <?php
    }
?>
<?php osc_current_admin_theme_path( 'parts/header.php' ) ; ?>
<div id="backup-setting">
    <!-- settings form -->
                    <div id="backup-settings">
                        <h2 class="render-title"><?php _e('Backup') ; ?></h2>
                        <form id="backup_form" name="backup_form" action="<?php echo osc_admin_base_url(true) ; ?>" method="post">
                            <input type="hidden" name="page" value="tools" />
                            <input type="hidden" name="action" value="" />
                            <fieldset>
                            <div class="form-horizontal">
                            <div class="form-row">
                                <div class="form-label"><?php _e('Backup folder') ; ?></div>
                                <div class="form-controls">
                                    <input type="text" class="input-large" name="bck_dir" value="<?php echo osc_esc_html(osc_base_path()); ?>" />
                                    <div class="help-box">
                                        <?php _e("<strong>WARNING</strong>: If you don't specify a backup folder, the backup files will be created in the root of your OSClass installation.") ; ?>
                                        <br />
                                        <?php _e("This is the folder in which your backups will be created. We recommend that you choose a non-public path.") ; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="button" id="backup_sql" onclick="javascript:submitForm(this.form, 'sql');" value="<?php echo osc_esc_html( __('Backup (store on server)') ) ; ?>" />
                                <input type="button" id="backup_sql_file" onclick="javascript:submitForm(this.form, 'sql_file');" value="<?php echo osc_esc_html( __('Backup (download file)') ) ; ?>" />
                                <input type="button" id="backup_zip" onclick="javascript:submitForm(this.form, 'zip');" value="<?php echo osc_esc_html( __('Backup (store on server)') ) ; ?>" />
                            </div>
                        </div>
                        </fieldset>
                    </form>
                </div>
                <!-- /settings form -->
</div>
<?php osc_current_admin_theme_path( 'parts/footer.php' ) ; ?>                