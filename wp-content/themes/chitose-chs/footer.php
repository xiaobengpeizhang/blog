			<div id="footer">
				<?php if (!is_single()) : ?>
				<div id="pager"><?php par_pagenavi(); ?></div>
				<?php else : ?>
				<div id="pager">
					<span class="pre"><?php previous_comments_link() ?></span>
					<span class="next"><?php next_comments_link() ?></span>
				</div>
				<?php endif; ?>
				<div id="copyright">
					<span class="info">&copy;<?php bloginfo('title'); ?></span>
					<a class="logo" href="http://tsin.us" title="这个网站使用「C.H.I.T.O.S.E.」模板" target="_blank"></a>
				</div>
			</div>
		</div>
	<?php wp_footer(); ?>
	</div>
</body>
</html>