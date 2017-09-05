<?php get_header() ?>
<?php the_post() ?>

<div class="col-md-9">
	<div class="post">
		<h1><?php the_title() ?></h1>
		<div class="post-thumbnail">
			<?php if (has_post_thumbnail()) : ?>
				<?php the_post_thumbnail('large') ?>
			<?php endif ?>
		</div>
		<?php the_content() ?>
	</div>
</div>

<?php get_template_part('sidebar') ?>

<?php get_footer() ?>