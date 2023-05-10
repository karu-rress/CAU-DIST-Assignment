# 주제

* 티켓(영화, 공연 등) 예매 사이트
* 도서 대여 사이트
* 학사 관리 사이트

개인 과제이며, HTML Form(폼)을 통해 입력되는 데이터를 테이블 형태로 보여주고, 데이터베이스에 저장하고, 수정하고, 삭제할 수 있도록 다음의 조건을 만족 시키는 PHP 문서들을 작성하시오.  
  
  
# 조건/요구사항
## `[HTML, CSS]` 입력 폼은 다음 중에 최소 4개를 사용해야 함.
(text와 password는 2개로 인정하지 않고, 동일 form 객체로 인정함)
- [X] text/password box
- [ ] textarea
- [X] checkbox
- [X] radio button
- [ ] dropdown list = select/option tag
- [ ] 그 외 HTML5에서 사용되는 calendar 등 다른 입력 폼도 허용됨
 
## `[PHP]`
- [X] 회원가입 및 Login 페이지는 필수 (로그인 후, 회원 전용 페이지와 비회원 페이지 구별)
- [ ] 나머지는 주제와 관련된 페이지로 구성하되, 1~3번의 조건/요구사항을 만족하는 페이지로 구성한다.   
예) 도서 대여 사이트인 경우, 비회원은 대여 불가하고, 전체 도서 목록만 열람 가능하며, 회원은 대여 가능  
    도서를 등록/수정/삭제하는 페이지가 필요하며, 회원이 도서 대여시 전체 도서 목록을 열람하는 페이지에서
    "대여가능"->"대여불가"로 상태변경해서 보여주어야 함
 
## `[DB]`
- [ ] 반드시 Join과 Subquery를 각각 1번 이상 사용하여 query를 작성하고, 이를 결과로 보여주어야 함.
- [X] 수정/삭제 기능을 위해서 update와 delete 사용
- [ ] 테이블의 개수는 최소 4개 이상이어야 하며,
- [ ] 각 테이블 당 record의 개수는 최소 10개 이상
 

## `[제출]` 제출해야 할 파일은 전체 소스코드와 데이터베이스 백업 파일을 모두 압축하여 학번.zip파일로 제출

백업 받을 때, 다음과 같이 (학번.sql 파일) 형태로...  // DB이름: test, Table이름: info 인 경우  

    C:\Users\Administrator>mysqldump -u root -p test info > 20221001.sql  

백업 후 반드시 백업이 잘 되었는지 sql 파일을 메모장에서 확인할 것.  
(반드시) 아래와 같이 테이블 생성 쿼리 및 저장 쿼리가 있어야 함.  

    CREATE TABLE `info` (
    `id` varchar(15) NOT NULL,
    `pwd` varchar(15) NOT NULL,
    `name` varchar(20) NOT NULL,
    `age` int DEFAULT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
    /*!40101 SET character_set_client = @saved_cs_client */;
    
    --
    -- Dumping data for table `info`
    --
    
    LOCK TABLES `info` WRITE;
    /*!40000 ALTER TABLE `info` DISABLE KEYS */;
    INSERT INTO `info` VALUES ('admin','admin','administrator1',66);