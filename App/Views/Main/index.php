		<div class="short-block">
			<div>
				<h3>Наша главная страница с комментариями о нашей компании</h3>
				<p>На этой странице размещены все отзывы, комментарии, пожелания и критика от клиентов нашей компании. Зарегистрировавшить вы тоже сможете оставить свой!</p>
			</div>
			
			<img src="/Images/rew.jpg" alt="Image missing">
		</div>

		<div class="short-block">
			<form method="POST" action="">
				<?php
				if (isset($_SESSION['userid']))
				{
				?>
					<p>Вы можете оставить свой комментарий:</p>
					<textarea cols="32" rows="8" name="comment"></textarea>
					<button name="send_comment" value="send_comment">Оставить комментарий</button>
				<?php
				}
				else
				{
				?>
				<p>Авторизуйтесь, чтобы оставлять комментарии</p>
				<?php
				}
				?>
			</form>
		</div>

		
		<?php
				foreach ($news as $k) {
		?>
					<div class="comment">
						<div>
							<p>Имя пользователя: <?=$k['username']?></p>
							<p>Комментарий: <?=$k['comment']?></p>
						</div>
						<?php
						if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1)
						{
						?>
						<form method="POST" action="">
							<button name="delete_comment" value=<?=$k['id']?>>Удалить</button>
						</form>
						<?php
						}
						?>
						
					</div>
		<?php
				}
		?>
		
