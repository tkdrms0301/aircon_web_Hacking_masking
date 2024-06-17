1. DB연결파일 수정 public_html/include/config.php

2. myadldump -u유저명 -p비밀번호  DB명 < db.sql

3. 쓰기권한설정
	chmod 707 gmEditor/uploaded
	chmod 707 board/data
	chmod 707 product_img

4. 이름, 계좌정보 등 개인정보 마스킹 적용

5. 불필요한 파일이나 이미지 등 제외