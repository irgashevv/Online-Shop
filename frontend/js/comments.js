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
		url: `/?model=comment&action=index&product_id=${parseInt($("input[name=product_id]").val())}`,
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

		const _self = $(this);

		let user =
			{
				username: $(this).find('input[name=username]').val(),
				email: $(this).find('input[name=email]').val(),
				avatar: '/imgs/avatar.jpg'
			};

		let product_id = $(this).find('input[name=product_id]').val();
		let text = $(this).find('textarea[name=message]').val();

		let comment = {
			product_id: product_id,
			username: user.username,
			email: user.email,
			avatar: user.avatar,
			text: text
			// product_id: product_id,
			// username: user.username,
			// email: user.email,
			// avatar: user.avatar,
			// text: text
		};
		console.log(comment);

		$.ajax({
			type: 'POST',
			url: '/?model=comment&action=create',
			data: comment,
			dataType: 'json',
			success: function(response) {
				if (response && response.result === 'OK') {
					//Add comment
					addComment(user, text)

					//Clear Form
					_self.find('input[name=username]').val('');
					_self.find('input[name=email]').val('');
					_self.find('textarea[name=message]').val('')
				}
			},
			error: function(data) {
				console.error(data)
			}
		});
		return false;
	})
});