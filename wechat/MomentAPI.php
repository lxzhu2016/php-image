<?php
class MomentAPI{
	function list_moments(){
		header("Content-Type: application/json; charset=UTF-8");
		$data=array(
			"code"=>200,
			"message"=>"OK",
			"data"=>array(
				"timestamp"=>"2015-05-28T08:06:55",
				"top_image_url"=>"",
				"users"=>array(
					array("userid"=>9527,"name"=>"朱良雄","thumbnail_url"=>"media/thumbnail/9527"),
					array("userid"=>1984,"name"=>"David Lee","thumbnail_url"=>"media/thumbnail/1984")
					),
				"moments"=>array(
					array(
						"momentid"=>456,
						"userid"=>9527,
						"create_datetime"=>"2015-05-28T07:48:00",
						"external_link"=>array(
							"url"=>"http://china.huanqiu.com/photo/2015-05/2778221.html",
							"thumbnail_url"=>"http://himg2.huanqiu.com/attachment2010/2015/0527/20150527083222352.jpg",
							"title"=>"“共和国涉文物第一大案”告破 追回文物1168件"
							),
						"text"=>"为了文档化一个变量，我们使用@ver标记",
						"gallery"=>array(
							"galleryid"=>100,
							"image_urls"=>array("gallery/100/1234","gallery/100/1345")
							),
						"location"=>array("code"=>"112.34,345.67","name"=>"昌平沙河路庄桥"),
						"device"=>array("name"=>"iPhone 5C"),
						"like"=>array("count"=>100,"who"=>array(9527,1984,2345,6785)),
						"comments"=>array(
							array("commentid"=>1345,"userid"=>9527,"text"=>"搞什么飞机哦?","create_datetime"=>"2015-05-28T08:19:00.123","parent_comment_id"=>1235)
							)
						),
					array(
						"momentid"=>456,
						"userid"=>9527,
						"create_datetime"=>"2015-05-28T07:48:00",						
						"text"=>"为了文档化一个变量，我们使用@ver标记",
						"gallery"=>array(
							"galleryid"=>100,
							"image_urls"=>array("gallery/100/1234","gallery/100/1345")
							),
						"location"=>array("code"=>"112.34,345.67","name"=>"昌平沙河路庄桥"),
						"device"=>array("name"=>"iPhone 5C"),
						"like"=>array("count"=>100,"who"=>array(9527,1984,2345,6785)),
						
						),
					array(
						"momentid"=>456,
						"userid"=>9527,
						"create_datetime"=>"2015-05-28T07:48:00",						
						"text"=>"为了文档化一个变量，我们使用@ver标记",
						"gallery"=>array(
							"galleryid"=>100,
							"image_urls"=>array("gallery/100/1234","gallery/100/1345")
							),
						"location"=>array("code"=>"112.34,345.67","name"=>"昌平沙河路庄桥"),
						"device"=>array("name"=>"iPhone 5C"),
						"like"=>array("count"=>100,"who"=>array(9527,1984,2345,6785)),
						
						),
					array(
						"momentid"=>456,
						"userid"=>9527,
						"create_datetime"=>"2015-05-28T07:48:00",						
						"text"=>"为了文档化一个变量，我们使用@ver标记",
						"gallery"=>array(
							"galleryid"=>100,
							"image_urls"=>array("gallery/100/1234","gallery/100/1345")
							),
						"location"=>array("code"=>"112.34,345.67","name"=>"昌平沙河路庄桥"),
						"device"=>array("name"=>"iPhone 5C"),
						"like"=>array("count"=>100,"who"=>array(9527,1984,2345,6785)),
						
						)
					)
				)
			);
		echo json_encode($data);
	}
}
?>