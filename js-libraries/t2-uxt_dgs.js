const serverUrl = "http://localhost/webtracer";
var timeInternal = 0;
var userId = "";
var domain = "";
var lastTime = 0;
var fixtime=0;

function onMessage(request)
{
    if (request.type == "solicita")
    {
        prepareSample();
    }
    else
    {
        capture(request.type, request.data);
    }
    //sendResponse({ farewell: "goodbye" });
});
var shot=5;
function capture(type, data)
{
            var url = new URL(tab.url);
            domain = url.hostname;
            //if(lastTime == (Math.ceil(data.Time) + timeInternal)&& ((type=="move" || type=="freeze") && //Math.ceil(data.Time) % 3 == 1)){
            //    data.imageData = "";
            //}
            if(type=="eye"){
                data.imageData = "NO";
                //data.Time-=0.2;
                Post(type, data);
            }else{
				if((type=="move" || type=="freeze") && shot<7){
					data.imageData = "NO";
					Post(type, data);              
					shot++;
				}
			}
        });
    });
}

function Post(type, data){
	if(fixtime<data.Time + timeInternal){
		fixtime=data.Time + timeInternal;
	}
    $.post(serverUrl+"/receiver.php",
                {
                    metadata: JSON.stringify({
                            sample: domain,
                            userId: userId,
                            type: type,
                            time: fixtime,
                            scroll: data.pageScroll,
                            height: data.pageHeight,
                            url: data.url
                    }),
                    data: JSON.stringify(data)

            }
			).fail(function (data){
				console.log(type+" "+data);
			}	
			
			).done(function (data) {
                console.log(type+" "+data);
                }
            );
}

function getRandomToken() {
    // E.g. 8 * 32 = 256 bits token
    var randomPool = new Uint8Array(32);
    window.crypto.getRandomValues(randomPool);
    var hex = '';
    for (var i = 0; i < randomPool.length; ++i) {
        hex += randomPool[i].toString(16);
    }
    // E.g. db18458e2782b2b77e36769c569e263a53885a9944dd0a861e5064eac16f1a
    return hex;
    //return 'db18458e2782b2b77e36769c569e263a53885a9944dd0a861e5064eac16f1a';
}

function prepareSample() {
    let items = Window.localStorage.getItem("userid");
    var loadedId = items.userid;
        function useToken(userid) {
            userId = userid;
                var url = new URL(window.location.href);
                domain = url.hostname;
                $.post(serverUrl+"/samplechecker.php", { userId: userid, domain: domain }).done(function (data) {
                    timeInternal = parseInt(data);});
        }
        if (loadedId !== null && loadedId !== "" && typeof loadedId  !== 'undefined') {
            useToken(loadedId);
        }
        else {
            loadedId = getRandomToken();
            Window.localStorage.setItem('userid',loadedId);
            useToken(loadedId);
        }
    });
}


var id = 0;
function init() {
    //alert("Mouse pos "+posX+" "+posY);
}

function clean() {
    window.localStorage.removeItem("userid");
    alert('Data Cleaned.');
});


