	// Change this to your username to load in your clips
		var vimeoUserName = 'user506516';
		
		// Tell Vimeo what function to call
		var userInfoCallback = 'userInfo';
		var videosCallback = 'showThumbs';
		
		// Set up the URLs
		var userInfoUrl = 'http://www.vimeo.com/api/v2/' + vimeoUserName + '/info.json?callback=' + userInfoCallback;
		var videosUrl = 'http://www.vimeo.com/api/v2/' + vimeoUserName + '/videos.json?callback=' + videosCallback;
		
		// This function loads the data from Vimeo
		function init() {
			var head = document.getElementsByTagName('head').item(0);
			
			var userJs = document.createElement('script');
			userJs.setAttribute('type', 'text/javascript');
			userJs.setAttribute('src', userInfoUrl);
			head.appendChild(userJs);
			
			var videosJs = document.createElement('script');
			videosJs.setAttribute('type', 'text/javascript');
			videosJs.setAttribute('src', videosUrl);
			head.appendChild(videosJs);
		}
		
		// This function goes through the clips and puts them on the page
		function showThumbs(videos) {
			var thumbs = document.getElementById('carousel');
			thumbs.innerHTML = '';
			
			var ul = document.createElement('ul');
			ul.setAttribute('id','video-list');
			thumbs.appendChild(ul);
			
			for (var i = 0; i < videos.length; i++) {
				var thumb = document.createElement('img');
				thumb.setAttribute('src', videos[i].thumbnail_small);
				thumb.setAttribute('alt', videos[i].title);
				thumb.setAttribute('title', videos[i].title);
				
				var a = document.createElement('a');
				a.setAttribute('href', videos[i].url);
				a.appendChild(thumb);
				
				var li = document.createElement('li');
				li.appendChild(a);
				ul.appendChild(li);
			}
		}
		
		// This function adds user info to the page
		//function userInfo(info) {
			//var stats = document.getElementById('stats');
			
			//var img = document.createElement('img');
			//img.setAttribute('id', 'portrait');
			//img.setAttribute('src', info.portrait_small);
			//img.setAttribute('alt', info.display_name);
			//stats.appendChild(img);
			
			//var h2 = document.createElement('h2');
			//h2.appendChild(document.createTextNode(info.display_name + "'s Videos"));
			//stats.appendChild(h2);
			
			//document.getElementById('bio').innerHTML = info.bio;
			//
		//}
		
		// Call our init function when the page loads
		window.onload = init;
		
			