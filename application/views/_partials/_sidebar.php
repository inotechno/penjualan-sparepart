 <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php
                      // data main menu
                        $main_menu = $this->db->get_where('menus', 
                                                  array('sub_menu' => 0, 'level' => $this->session->userdata('level')));
                        foreach ($main_menu->result() as $main) {
                            // Query untuk mencari data sub menu
                            $sub_menu = $this->db->get_where('menus', 
                                                  array('sub_menu' => $main->id, 'level' => $this->session->userdata('level')));

                            // periksa apakah ada sub menu
                        if ($sub_menu->num_rows() > 0) {?>
                                <li class="menu-item-has-children dropdown <?= $main->link == $this->uri->segment(2) ? 'active show open':''; ?>">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="menu-icon <?= $main->icon .' '. $main->warna  ?>"></i><?= $main->nama_menu ?>
                                    </a>
                                    <ul class="sub-menu children dropdown-menu <?= $main->link == $this->uri->segment(2) ? 'active show':''; ?>"> 
                                        <?php foreach ($sub_menu->result() as $sub) {?>
                                            <li>
                                                <i class="<?= $sub->icon .' '.$sub->warna?>"></i>
                                                <a href="<?= base_url($this->session->userdata('link').'/'.$main->link.'/'.$sub->link) ?>"><?= $sub->nama_menu ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                        <?php } else { ?>
                            <li class="<?= base_url($this->session->userdata('link')."/".$main->link) == current_url() ? 'active':''; ?>">
                                <a href="<?= base_url($this->session->userdata('link').'/'.$main->link) ?>">
                                    <i class="menu-icon <?= $main->icon .' '. $main->warna ?>"></i><?= $main->nama_menu ?>
                                </a>
                            </li>
                        <?php 
                            }
                        } 
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->