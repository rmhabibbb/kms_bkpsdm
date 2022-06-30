 <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image"> 
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  style="color: black">Admin</div>
                    <div class="email"  style="color: black"><?=$email?></div>
                     
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list"> 
                    <li class="header">
                        Menu
                    </li>  
                        <?php if ($index == 1): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin')?>">
                                <i class="material-icons">home</i>
                                <span>Dashboard</span>
                            </a>
                        </li> 
                        <?php if ($index == 2): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/pengetahuan')?>">
                                <i class="material-icons">book</i>
                                <span>Pengetahuan</span>
                            </a>
                        </li> 
                        <?php if ($index == 3): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/pengajuan')?>">
                                <i class="material-icons">assignment</i>
                                <span>Pengajuan Pengetahuan</span>
                            </a>
                        </li>  
                        <?php if ($index == 4): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/sop')?>">
                                <i class="material-icons">assignment_turned_in</i>
                                <span>SOP</span>
                            </a>
                        </li>  
                        <?php if ($index == 5): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/kategori')?>">
                                <i class="material-icons">list</i>
                                <span>Kategori</span>
                            </a>
                        </li>  
                        <?php if ($index == 6): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/pegawai')?>">
                                <i class="material-icons">people</i>
                                <span>Pegawai</span>
                            </a>
                        </li> 
                        
                        
                        <?php if ($index == 7): ?>
                          <li class="active">
                        <?php else: ?>
                          <li>
                        <?php endif; ?>
                            <a href="<?=base_url('admin/profil')?>">
                                <i class="material-icons">account_circle</i>
                                <span>Profil</span>
                            </a>
                        </li> 
                        
                        <li> 
                            <a href="<?=base_url('logout')?>">
                                <i class="material-icons">input</i>
                                <span>Logout</span>
                            </a>
                        </li> 
                        
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                     <a href="javascript:void(0);"></a>.
                </div>
                
            </div>
            <!-- #Footer -->
        </aside>