function addComment(user, text)
{
	let html = $(`<div-- class="comment">
		<div class="user-info">
			<div><img src="${user.avatar}"></div>
				<div class="username">${user.username}</div>
			</div>
				<div class="text">${text}</div>
		</div`);
	$("#comments .comments-list").append(html);
}

jQuery(document).ready(function($)
{
	$.ajax
	({
		type: 'GET',
		url: '/?model=comment&action=index&product_id=3274',
		dataType: 'json',
			success: function (comments)
			{
				for (let index in comments)
				{
				let comment = comments[index];

				let user =
				{
					username: comment.username,
					avatar: comment.avatar
				}

			addComment(user, comment.comment);
				}
			},
			error: function(data)
			{
				console.error(data)
			}
	});

	$("#comment-form").submit(function (event)
	{
		event.stopPropagation();
		let user =
		{
			username: $(this).find('input[name=username]').val(),
			email: $(this).find('input[name=email]').val(),
			avatar: '/imgs/avatar.jpg'
		};
		let text =  $(this).find('textarea[name=message]').val()

		//Add comment
		addComment(user, text)

		//Clear Form
		$(this).find('input[name=username]').val('');
		$(this).find('input[name=email]').val('');
		$(this).find('textarea[name=message]').val('');
		return false;
	})
});