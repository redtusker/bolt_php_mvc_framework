<?php
/* Smarty version 5.4.3, created on 2025-01-02 18:49:48
  from 'file:base.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.3',
  'unifunc' => 'content_6776dfcce0eac2_37926910',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e9ea4d927cad37c9711dfde9937b3a45a1fa937' => 
    array (
      0 => 'base.tpl',
      1 => 1735843622,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6776dfcce0eac2_37926910 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\laragon\\www\\nemtv3_bolt_php_mvc_framework\\src\\Views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, false);
$_smarty_tpl->getCompiled()->nocache_hash = '3976965766776dfccdf7590_90840254';
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_15900463936776dfcce0b954_11944291', "title");
?>
</title>
</head>
<body>
    <header>
        <h1><?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_19125239156776dfcce0dd54_10732251', "header");
?>
</h1>
    </header>
    <main>
        <?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_14943574056776dfcce0e4c9_43565179', "content");
?>

    </main>
</body>
</html>
<?php }
/* {block "title"} */
class Block_15900463936776dfcce0b954_11944291 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\laragon\\www\\nemtv3_bolt_php_mvc_framework\\src\\Views';
?>
My Website<?php
}
}
/* {/block "title"} */
/* {block "header"} */
class Block_19125239156776dfcce0dd54_10732251 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\laragon\\www\\nemtv3_bolt_php_mvc_framework\\src\\Views';
?>
Welcome<?php
}
}
/* {/block "header"} */
/* {block "content"} */
class Block_14943574056776dfcce0e4c9_43565179 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\laragon\\www\\nemtv3_bolt_php_mvc_framework\\src\\Views';
}
}
/* {/block "content"} */
}
