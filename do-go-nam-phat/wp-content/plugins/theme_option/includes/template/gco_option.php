<h1>Quản lý Tuỳ chỉnh</h1>

<form method="post" action="" class="form_option">
    <table>
        <tr>
            <td><b>Phone, zalo</b></td>
            <td>
                <input type="text" name="your-phone" value="<?php echo $phone; ?>" placeholder="0359117301">
            </td>
        </tr>
        <tr>
            <td><b>Messenger</b></td>
            <td>
                <input type="text" name="your-messenger" value="<?php echo $messenger; ?>" placeholder="m.me/1869377543355898">
            </td>
        </tr>
        <tr>
            <td><b>Chat Facebook</b></td>
            <td>
                <textarea name="your-chatfb" placeholder="Nhúng iframe" cols="40" rows="6"><?php echo $chatfb; ?></textarea>
            </td>
        </tr>
        <tr>
            <td><b>Back to top</b></td>
            <td>
                <input type="checkbox" name="your-backtop" value="<?php echo $backtop; ?>" <?php if($backtop == 'on') { echo 'checked="checked"'; } ?>>
                Bạn có muốn hiển thị nút Back to top?
            </td>
        </tr>
        <tr>
            <td><b>Popup contact form 7</b></td>
            <td>
                <textarea name="your-form" placeholder="Nhúng shortcode" cols="40" rows="3"><?php echo $form; ?></textarea>
            </td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="save_option" value="Lưu"/></td>
        </tr>
    </table>
</form>

<style type="text/css">
    .save_option_success {
        color: red;
        font-weight: bold;
        font-size: 20px;
        margin: 20px 0 10px;
    }
    .form_option table {
        background: #fff;
        padding: 15px 10px;
        width: 50%;
        border-radius: 10px;
    }
    .form_option input[type=text], .form_option textarea {
        width: 100%;
    }
</style>