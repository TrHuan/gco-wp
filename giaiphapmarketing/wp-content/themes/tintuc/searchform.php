<form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
    <input class="text-search" type="text" value="Từ khóa tìm kiếm"
        name="s" id="s"  onblur="if (this.value == '')  {this.value = 'Từ khóa tìm kiếm';}"
        onfocus="if (this.value == 'Từ khóa tìm kiếm') {this.value = '';}" />
    <input type="submit" id='buttom-search' class='buttom-search' value="" />
</form>