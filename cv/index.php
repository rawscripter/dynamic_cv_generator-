<?php 
require_once('../app/init.php');

$id = $_GET['cv'] ?? null;

if ($id == null) {
	header('location: ../index.php');
}

$sql = "SELECT * FROM cv_genarator WHERE id = $id ";
$sth = $pdo->prepare($sql);
$sth->execute();
$person = $sth->fetch(PDO::FETCH_OBJ);

$exp = json_decode($person->experience,true);
$edu = json_decode($person->education,true);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

	<title><?php echo $person->first_name ?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" /> 
	<link rel="stylesheet" type="text/css" href="resume.css" media="all" />

</head>
<body>

	<div id="doc2" class="yui-t7">
		<div id="inner">

			<div id="hd">
				<div class="yui-gc">
					<div class="yui-u first">
						<h1><?php echo ucfirst($person->first_name . ' ' . $person->last_name) ?></h1>
						<h2><?php echo $person->profile_title ?></h2>
					</div>

					<div class="yui-u">
						<div class="contact-info">
							<h3><a href="<?php echo $person->email ?>"><?php echo $person->email ?></a></h3>
							<h3><?php echo $person->phone ?></h3>
						</div><!--// .contact-info -->
					</div>
				</div><!--// .yui-gc -->
			</div><!--// hd -->

			<div id="bd">
				<div id="yui-main">
					<div class="yui-b">

						<div class="yui-gf">
							<div class="yui-u first">
								<h2>Profile</h2>
							</div>
							<div class="yui-u">
								<p class="enlarge">
									<?php echo $person->profile_des ?>
								</p>
							</div>
						</div><!--// .yui-gf -->


						<div class="yui-gf">
							<div class="yui-u first">
								<h2>Skills</h2>
							</div>
							<div class="yui-u">

								<?php foreach (json_decode($person->skills) as $skill): ?>

									<ul class="talent">
										<li><?php print_r($skill) ?></li>
									</ul>

								<?php endforeach ?>

							</div>
						</div><!--// .yui-gf-->

						<div class="yui-gf">

							<div class="yui-u first">
								<h2>Experience</h2>
							</div><!--// .yui-u -->

							<div class="yui-u">

								<?php for($i=0;$i<count($exp['ex_company']); $i++){ ?>


								<div class="job">
									<h2><?php echo $exp['ex_company'][$i] ?></h2>
									<h3><?php echo $exp['ex_deg'][$i] ?></h3>
									<h4><?php 
									echo date('M Y', strtotime($exp['ex_start'][$i])) ?> 
									- 
									<?php echo date('M Y', strtotime($exp['ex_end'][$i])) ?></h4>
									<p> <?php echo $exp['ex_job_des'][$i] ?></p>
								</div>

							<?php } ?>

							</div><!--// .yui-u -->
						</div><!--// .yui-gf -->


						<div class="yui-gf last">
							<div class="yui-u first">
								<h2>Education</h2>
							</div>

							<?php for($i=0;$i<count($edu['deg']); $i++){ ?>
							<div class="yui-u">
								<h2><?php echo $edu['deg'][$i] ?></h2>
								<h3><?php echo ucfirst($edu['edu_group'][$i]) ?>, <?php echo $edu['edu_inst'][$i] ?> &mdash; <strong><?php echo $edu['edu_gpa'][$i] ?> GPA</strong> </h3>
							</div>
	<?php } ?>

						</div><!--// .yui-gf -->


					</div><!--// .yui-b -->
				</div><!--// yui-main -->
			</div><!--// bd -->

			<div id="ft">
				<p><?php echo ucfirst($person->first_name . ' ' . $person->last_name) ?>e &mdash; <a href="mailto:<?php echo $person->email ?>"><?php echo $person->email ?></a> </p>
			</div><!--// footer -->

		</div><!-- // inner -->


	</div><!--// doc -->


</body>
</html>

