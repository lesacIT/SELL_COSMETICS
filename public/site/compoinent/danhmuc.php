<?php 

    use CNWeb\PROJECT\LoaiSanPham;
    $loaisanpham = new LoaiSanPham($PDO);
    $ds = $loaisanpham->all();

?>

<nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
        <?php foreach ($ds as $loaisanpham) : ?>
        <a href="" class="nav-item nav-link"><?= $loaisanpham->tenloai ?></a>
                        
            <?php endforeach ?>
    </div>
</nav>


 