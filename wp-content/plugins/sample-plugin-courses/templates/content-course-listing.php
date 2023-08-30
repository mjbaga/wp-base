<main>
	<?php print $data->content ?>
	<div class="listing">
		<div class="container">
			<div id="dataContainer" data-endpoint="/wp-json/courses/list" data-school="all" data-interests="all"></div>
			<div class="listing__filters">
				<div class="filter-box interests">
					<?php if(!empty($data->terms)): ?>
						<h3 class="block-title">Courses by Interests</h3>
						<ul class="filters">
							<li><a class="filter-all selected" href="#" data-val="all">View all</a></li>
							<?php foreach($data->terms as $term): ?>
								<li>
									<a href="#" data-val="<?php print $term->slug ?>">
										<?php print $term->name ?>
									</a>
								</li>
							<?php endforeach ?>
						</ul>

					<?php endif; ?>
				</div>
				<div class="filter-box school">
					<?php if(!empty($data->schools)): ?>
						<h3 class="block-title">Courses by Academic Schools</h3>
						<ul class="filters">
							<li><a class="filter-all selected" href="#" data-val="all">View all</a></li>
							<?php foreach($data->schools as $school): ?>
								<li>
									<a class="<?php print $school['school_code'] ?>" href="#" data-val="<?php print $school['school_id'] ?>">
										<?php print $school['school'] ?>
									</a>
								</li>
							<?php endforeach ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>
			<div class="listing__container"></div>
		</div>
		<script id="listTemplate" type="text/x-dot-template">
			{{? it.length }}
			{{~ it :item }}
			<div class="listing__group"><a class="school-link" href="{{=item.school_link}}" target="_blank">
					<h3 class="interest">{{=item.school}}</h3></a>{{? item.courses.length }}
				<ul class="courses">{{~ item.courses :course }}
					<li><a href="{{=course.link}}" target="_blank">{{=course.name}}</a><span class="course-abbrv {{=course.abbrv}}">{{=course.courseCode}}</span></li>{{~}}
				</ul>{{?}}
				<hr>
			</div>{{~}}
			{{??}}
			<p>Sorry, no courses found.</p>{{?}}
		</script>
	</div>
</main>