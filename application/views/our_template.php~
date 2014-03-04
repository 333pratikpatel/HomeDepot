<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />

<?php
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

<?php endforeach; ?>
<?php foreach($js_files as $file): ?>

    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<style type='text/css'>
body
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}
</style>
</head>
<body>
<br>
<div id="logo">
<div style="font-size: x-large; color:#993399"><img src="<?php echo base_url(); ?>image/skill_home_logo.jpg" title="Skill Home" alt="Skill Home" />  Admin Panel</div>
<div align="right" style="font-size:larger">Welcome, Skill Home Admin 
	<a style="font-size:larger" href="<?php echo base_url(); ?>index.php/admin/logout">Logout</a>&nbsp;&nbsp;&nbsp;
</div>
</div>

<!-- Beginning header -->
<div>
        <a href='<?php echo site_url('admin/worker')?>'>Workers</a> |
		<a href='<?php echo site_url('admin/company')?>'>Companies</a> |
		<a href='<?php echo site_url('admin/service_category')?>'>Services</a> |
		<a href='<?php echo site_url('admin/service_subcategory')?>'>Service Subcategories</a> |
		<a href='<?php echo site_url('admin/expert_area')?>'>Expertice Areas</a> |
		<a href='<?php echo site_url('admin/company_advertise')?>'>Company Advertise</a>  |
		<a href='<?php echo site_url('admin/worker_category')?>'>Worker Category</a>   |
		<a href='<?php echo site_url('admin/core_group')?>'>Core Group</a>  
</div>

<!-- End of header-->
    <div style='height:20px;'></div>
    <div>
        <?php echo $output; ?>

    </div>
<!-- Beginning footer -->
<!-- End of Footer -->
</body>
</html>
