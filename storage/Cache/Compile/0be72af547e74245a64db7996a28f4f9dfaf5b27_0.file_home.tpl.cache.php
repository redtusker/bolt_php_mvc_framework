<?php
/* Smarty version 5.4.3, created on 2025-01-02 18:46:51
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_6776df1b5c0134_50139668',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0be72af547e74245a64db7996a28f4f9dfaf5b27' => 
    array (
      0 => 'home.tpl',
      1 => 1735843610,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6776df1b5c0134_50139668 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\laragon\\www\\nemtv3_bolt_php_mvc_framework\\src\\Views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
$_smarty_tpl->getCompiled()->nocache_hash = '5659343736776df1b57d072_88501730';
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7219533216776df1b5b5417_91556196', "title");
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_17613039066776df1b5bd9c2_49162965', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "base.tpl", $_smarty_current_dir);
}
/* {block "title"} */
class Block_7219533216776df1b5b5417_91556196 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\laragon\\www\\nemtv3_bolt_php_mvc_framework\\src\\Views';
?>
Home Page<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_17613039066776df1b5bd9c2_49162965 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\laragon\\www\\nemtv3_bolt_php_mvc_framework\\src\\Views';
?>

    <h2>Welcome to the Home Page!</h2>
    <p>Here is some content specific to the home page.</p>
<?php
}
}
/* {/block "content"} */
}
