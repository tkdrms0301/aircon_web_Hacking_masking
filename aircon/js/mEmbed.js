/******************************************************************
	title : mEmbed v1.1
	contents : IE��ġ�� ���� embed �±׸� js�� ����Ѵ�.
	�� �ҽ��� ���� JS������ �ݵ�� src�� �ܺο��� ȣ��Ǿ���ϰ�
	<script>mEmbed("src=source.swf","width=100","height=100", "wmode=Tranpsarent");</script>
	�� ���� �������� �÷��� �±׸� ����ؼ� �־��ش�.
	mGET �Լ��� �ι迭�� �̿��� Ű���� Data �� �������� �Լ�.(mEmbed�� �ʿ�)
	ex) srcdata = mGET(key,value,'src'); -> php�� $srcdata = $array['src'];
	by : http://blog.daum.net/battlej
	******************************************************************/

	function mGET(arrayKey, arrayValue, Value) {
		count = arrayKey.length;
		for(i=0;i<count;i++) {
			if(arrayKey[i]==Value) {
				return arrayValue[i];
				break;
			}
		}
	}

	function mEmbed() {
		var key = new Array();
		var value = new Array();
		var contents;
		var embed_type;
		var error_check=0;
		var i, j;
		var count;
		var data;
		var temp;
		if(mEmbed.arguments.length==1) {
			contents = mEmbed.arguments[0];
		} else {
			for(i=0;i<mEmbed.arguments.length;i++) {
				temp = mEmbed.arguments[i].replace(/"|'/g,"");
				data = temp.split('=');
				key[i] = data[0];
				value[i] = data[1];
				count = data.length;

				for(j=2;j<count;j++) {
					value[i] += '=' + data[j];
				}
			}

			contents='';
			srcdata = mGET(key,value,'src');

			if(/\.(swf)$/.test(srcdata)) {
				embed_type = 1;
			} else if(/\.(mov|avi|wma|wmv)$/.test(srcdata)) {
				embed_type = 2;
			}

			var classid = mGET(key,value,'classid');
			var codebase = mGET(key,value,'codebase');

			if(embed_type==1) {
				classid = 'clsid:D27CDB6E-AE6D-11cf-96B8-444553540000';
				codebase = 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0';
			} else if(embed_type==2) {
				classid = 'clsid:22D6F312-B0F6-11D0-94AB-0080C74C7E95';
				codebase = 'http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,5,715';
			}

			if(classid && codebase) {
				contents += '<object';
				if(classid) {
					contents += ' classid="' + classid + '"';
				}
				if(codebase) {
					contents += ' codebase="' + codebase + '"';
				}
				count = key.length;
				for(i=0;i<count;i++) {
					if(value[i]!='') {
						if(key[i]!='src') {
							contents += ' ' + key[i] + '="' + value[i] + '"';
						}
					}
				}
				contents += '>';
				for(i=0;i<count;i++) {
					if(value[i]!='') {
						if(embed_type==1 && key[i]=='src') {
							contents += '<param name="movie" value="' + value[i] + '" />';
						} else {
							contents += '<param name="' + key[i] + '" value="' + value[i] + '" />';
						}
					}
				}
			}
			count = key.length;
			contents += '<embed';
			for(i=0;i<count;i++) {
				if(value[i]!='') {
					contents += ' ' + key[i] + '="' + value[i] + '"';
				}
			}
			contents += '>';
			contents += '</embed>';
			if(classid && codebase) {
				contents += '</object>';
			}
		}
		document.write(contents);
	}
