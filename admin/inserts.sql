--insert user
INSERT INTO user(id, firstName, middleName,lastName,mobile,email,passwordHash,registeredAt,lastLogin,intro,profile)
VALUES('1','chrisAdmin','Octavian','TheHacker','555-555-5555','email@email.com','passwordExampleHash','2021-08-05 12:00:00','2021-08-05 11:00:00','intro','profileurl');

--insert post
INSERT INTO post(id, authorId, parentId,title,metaTitle,slug,summary,published,createdAt,updatedAt,publishedAt,content)
VALUES('1','1','1','Too Late To Code?','too-late-to-code-blog-post','slug123example','This blog post is about developers who cannot decide on whether or not it is too late to start coding or not.','1','2021-08-05 11:00:00','2021-08-05 12:00:00','2021-08-05 12:00:00','huge random example text for this blog post that i am making, i hope you all enjoy this blog site that I am making. I plan on bringing people together from all four corners of the world to talk and discuss our opinions in a freindly and judemental free zone. I love you all.');

--insert post_meta
INSERT INTO post_meta(id,postId,meta_key,content) VALUES('1','1','keyisavarchar','this is the meta_key content');

--insert post_comment
INSERT INTO post_comment(id, postId, parentId,title,published,createdAt,publishedAt,content)
VALUES('1','1','1','Too Late To Code?','1','2021-08-05 11:00:00','2021-08-05 11:00:00','comment Content here hehehehe lols xD');

--insert category
INSERT INTO category(id, parentId,title,metaTitle,slug,content)
VALUES('1','1','Coding','coding-category-meta','slug-for-category','Coding');

--insert post_category
INSERT INTO post_category(postId, categoryId)
VALUES('1','1');
