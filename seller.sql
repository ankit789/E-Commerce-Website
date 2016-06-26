drop database if exists db_project;
create database db_project;
use db_project;

create table seller_login (
seller_id int(10) primary key not null auto_increment,
seller_name varchar(32) not null,
email_id varchar(32),
contact_no int(10),
password varchar(50),
city varchar(15),
state varchar(15),
zipcode int(10)
);

insert into seller_login(seller_name,email_id,contact_no,password,city,state,zipcode) values("kharche","kharche@gmail.com",1265432121,"abc","jaipur","rajasthan",302017);
insert into seller_login(seller_name,email_id,contact_no,password,city,state,zipcode) values("vishal","vishal@gmail.com",1222352121,"def","allahabad","UP",102017);
insert into seller_login(seller_name,email_id,contact_no,password,city,state,zipcode) values("chomu","chomu@gmail.com",1223421121,"ghi","mumbai","maharashtra",202017);
insert into seller_login(seller_name,email_id,contact_no,password,city,state,zipcode) values("goyal","goyal@gmail.com",1767332121,"jkl","jodhpur","rajasthan",402017);
insert into seller_login(seller_name,email_id,contact_no,password,city,state,zipcode) values("apss","apss@gmail.com",1229892121,"mno","bhopal","MP",502017);
insert into seller_login(seller_name,email_id,contact_no,password,city,state,zipcode) values("ashish","ashish@gmail.com",1279432121,"pqr","malkapur","maharashtra",602017);
insert into seller_login(seller_name,email_id,contact_no,password,city,state,zipcode) values("asa","asa@gmail.com",1222388821,"stu","sheopur","MP",702017);
insert into seller_login(seller_name,email_id,contact_no,password,city,state,zipcode) values("shubham","shubham@gmail.com",1227772121,"vwx","bikaner","rajasthan",802017);
insert into seller_login(seller_name,email_id,contact_no,password,city,state,zipcode) values("prashant","prashant@gmail.com",1222666121,"yza","sriganganagar","rajasthan",902017);
insert into seller_login(seller_name,email_id,contact_no,password,city,state,zipcode) values("somu","somu@gmail.com",1222789121,"bcd","sikar","rajasthan",302029);

create table customer_login(

customer_id int(10) primary key not null auto_increment,
customer_name varchar(32) not null,
email_id varchar(32),
contact_no int(10),
password varchar(50),
addr varchar(50),
city varchar(15),
state varchar(15),
zipcode int(10)
);

insert into customer_login(customer_name,email_id,contact_no,password,addr,city,state,zipcode) values("umesh","um@gmail.com",1234567890,"a","malviya nagar","jaipur","rajashtan",101031);
insert into customer_login(customer_name,email_id,contact_no,password,addr,city,state,zipcode) values("ashutosh","as@gmail.com",2234567890,"b","jawahar nagar","jodhpur","rajasthan",201031);
insert into customer_login(customer_name,email_id,contact_no,password,addr,city,state,zipcode) values("jignesh","ji@gmail.com",3234567890,"c","pratap nagar","mumbai","maharashtra",301031);
insert into customer_login(customer_name,email_id,contact_no,password,addr,city,state,zipcode) values("yogesh","yo@gmail.com",4234567890,"d","abc nagar","jalandhar","punjab",401031);
insert into customer_login(customer_name,email_id,contact_no,password,addr,city,state,zipcode) values("mahesh","ma@gmail.com",5234567890,"e","def nagar","kolkata","west bengal",501031);
insert into customer_login(customer_name,email_id,contact_no,password,addr,city,state,zipcode) values("ramesh","ra@gmail.com",6234567890,"f","ghi nagar","bhopal","MP",601031);
insert into customer_login(customer_name,email_id,contact_no,password,addr,city,state,zipcode) values("suresh","su@gmail.com",7234567890,"g","jkl nagar","gandhinagar","gujarat",701031);
insert into customer_login(customer_name,email_id,contact_no,password,addr,city,state,zipcode) values("naresh","na@gmail.com",8234567890,"h","mno nagar","hyderabad","telangana",801031);
insert into customer_login(customer_name,email_id,contact_no,password,addr,city,state,zipcode) values("lokesh","lo@gmail.com",9234567890,"i","pqr nagar","banglore","karnataka",901031);
insert into customer_login(customer_name,email_id,contact_no,password,addr,city,state,zipcode) values("rajesh","ra@gmail.com",0234567890,"j","stu nagar","udaipur","rajashtan",101091);

create table category(cat_id int(10) primary key not null auto_increment,

						category_name varchar(32)

						);

insert into category(category_name) values("electronics");
insert into category(category_name) values("mens");
insert into category(category_name) values("womens");	
insert into category(category_name) values("kids");
insert into category(category_name) values("home_and_furniture");
insert into category(category_name) values("books_and_media");
insert into category(category_name) values("auto_and_sports");


create table sub_category(sub_cat_id int(10) primary key not null auto_increment,
							cat_id int(10),
							sub_category_name varchar(32),
							sub_category_image varchar(32),
							request_table_name varchar(32),
							foreign key (cat_id) references category (cat_id)
							);


insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(1,"mobiles","http://img6a.flixcart.com/image/mobile/f/s/k/samsung-galaxy-j7-sm-j700f-400x400-imae9cdffd5t4yzb.jpeg","r_mobiles_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(1,"laptops","http://img5a.flixcart.com/image/computer/e/q/s/lenovo-notebook-400x400-imae2ednkbmharyk.jpeg","r_laptops_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(1,"televisions","http://img6a.flixcart.com/image/television/g/c/6/vu-40d6575-400x400-imaebagzfbsdfqmw.jpeg","r_televisions_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(1,"cameras","http://img5a.flixcart.com/image/camera/d/h/m/canon-eos-1200d-kit-ef-s18-55-is-ii-55-250-mm-is-ii-dslr-400x400-imaey5h3ehhfwdg3.jpeg","r_cameras_specs");

insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(2,"shoes","http://img6a.flixcart.com/image/shoe/w/y/s/blue-858194-nike-12-400x400-imae9pq4favdez2q.jpeg","r_shoes_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(2,"slippers","http://img5a.flixcart.com/image/slipper-flip-flop/f/b/2/05-insignia-vermillion-orange-356515-puma-6-400x400-imaduwhaw5hhdsk5.jpeg","r_slippers_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(2,"sandals","http://img6a.flixcart.com/image/sandal/h/q/d/shadow-black-dandelion-vesta-sdl-dp-puma-9-400x400-imae7qkpmrrggvum.jpeg","r_sandals_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(2,"watches","http://img6a.flixcart.com/image/watch/y/a/t/3111sl03-fastrack-400x400-imae2sq39eyshg89.jpeg","r_watches_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(2,"sunglasses","http://img6a.flixcart.com/image/sunglass/g/y/f/pc003bk3-fastrack-free-size-400x400-imadrcem6mqe3cpr.jpeg","r_sunglasses_specs");

insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(3,"shoes","http://img5a.flixcart.com/image/shoe/u/g/9/gravel-blazing-pink-white-m47906-reebok-7-400x400-imae4ty452twqb5v.jpeg","r_shoes_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(3,"slippers","http://img6a.flixcart.com/image/slipper-flip-flop/f/t/a/metallic-dark-grey-mosaic-blue-34929305-puma-7-400x400-imaebuk8fwgyhdg5.jpeg","r_slippers_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(3,"sandals","http://img6a.flixcart.com/image/sandal/s/d/n/gry-blu-rewind-fila-7-400x400-imae5fx7ztehzmxs.jpeg","r_sandals_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(3,"watches","http://img5a.flixcart.com/image/watch/a/g/k/6078sl09-fastrack-400x400-imadypzvgvx9meed.jpeg","r_watches_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(3,"sunglasses","http://img6a.flixcart.com/image/sunglass/t/m/r/jb-999-c1-joe-black-58-400x400-imadswbu3pxexcjc.jpeg","r_sunglasses_specs");

insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(4,"toys","http://img5a.flixcart.com/image/stuffed-toy/z/z/y/dimpy-stuff-42-teddy-bear-400x400-imae8766yqe3pgvg.jpeg","r_toys_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(4,"boys_clothing","http://img5a.flixcart.com/image/ethnic-set/s/d/u/48-36-etb115rd-dotnditto-400x400-imae5ytxhcgr5wqg.jpeg","r_boys_clothing_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(4,"girls_clothing","http://img6a.flixcart.com/image/dress/t/8/a/84-72-808-red-aarika-400x400-imae73g7vct2ecre.jpeg","r_girls_clothing_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(4,"boys_footware","http://img6a.flixcart.com/image/shoe/w/r/y/white-rsj116-ridhi-sidhi-27-400x400-imae6qz7cpcxm5pv.jpeg","r_boys_footware_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(4,"girls_footware","http://img5a.flixcart.com/image/sandal/t/g/d/gold-rsj567-ridhi-sidhi-31-400x400-imae8mw2gku55ygj.jpeg","r_girls_footware_specs");


insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(5,"sofas","http://img6a.flixcart.com/image/sofa-sectional/z/v/m/6000020207001-semi-aniline-leather-hometown-brown-brown-400x400-imae94v2svyh3qyn.jpeg","r_sofas_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(5,"beds","http://img5a.flixcart.com/image/dining-set/e/k/g/800024870001-8-seater-rubber-wood-hometown-beige-brown-400x400-imae8z43hnneuben.jpeg","r_beds_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(5,"dining_table","http://img6a.flixcart.com/image/bed/9/r/z/resn-0667-mahogany-queen-rosewood-sheesham-natural-living-400x400-imaeadbzrzhzfzkk.jpeg","r_dining_table_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(5,"center_table","http://img5a.flixcart.com/image/coffee-table/s/y/9/zee-34476-tempered-glass-durian-black-400x400-imae8y3y9udd7qej.jpeg","r_center_table_specs");

insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(6,"literature","http://img5a.flixcart.com/image/book/5/4/6/empire-of-the-moghul-raiders-from-the-north-400x400-imadryvzxcaqzscf.jpeg","r_literature_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(6,"movies","http://img6a.flixcart.com/image/av-media/movies/q/d/e/fast-furious-7-400x400-imaea5d7h3mdj6fd.jpeg","r_movies_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(6,"music_cd","http://img5a.flixcart.com/image/av-media/music/p/h/y/the-essential-gipsy-kings-400x400-imadcnvagggdtuea.jpeg","r_music_cd_specs");

insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(7,"car_accesories","http://img5a.flixcart.com/image/car-kit/j/f/g/aeoss-car-digital-mp3-player-fm-transmitter-modulator-lcd-usb-sd-400x400-imae3gcbzwb8bpu7.jpeg","r_car_accesories_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(7,"lubrication_and_oil","http://img6a.flixcart.com/image/vehicle-lubricant/p/f/e/5100-15w50-motul-1-400x400-imae7qhv9fdhnggt.jpeg","r_lubrication_and_oil_specs");
insert into sub_category(cat_id,sub_category_name,sub_category_image,request_table_name) values(7,"helmet","http://img5a.flixcart.com/image/helmet/t/f/t/na-1-ls2-60-flip-up-ff393-convert-400x400-imae9meywpeqneuu.jpeg","r_helmet_specs");


create table product(product_id int(10) primary key not null auto_increment,
cat_id int(10) ,
 foreign key(cat_id) references category(cat_id), 
sub_cat_id int(10) ,
foreign key(sub_cat_id) references sub_category(sub_cat_id),
seller_id int(10),
foreign key(seller_id) references seller_login(seller_id),
price int(10) not null,
product_name varchar(32),
pimage varchar(255)
);

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(1,1,1,41837,"iphone 6","http://img6a.flixcart.com/image/mobile/h/k/n/apple-iphone-6-400x400-imaeymdqym6hsu7f.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(1,1,2,6199,"canvas express 2","http://img5a.flixcart.com/image/mobile/n/9/w/micromax-canvas-xpress-2-e313-400x400-imae9ztr8zkg3m4z.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(1,1,3,12999,"moto G (3rd Gen)","http://img6a.flixcart.com/image/mobile/w/t/n/motorola-moto-g-3rd-generation-ap3560ae7k8-400x400-imae9h4h8gkbpq56.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(1,1,4,12390,"galaxy J5","http://img5a.flixcart.com/image/mobile/u/7/v/samsung-galaxy-j5-sm-j500f-400x400-imae9c8akc24h6pg.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(1,2,5,20930,"HP 15-ac040TU Notebook","http://img5a.flixcart.com/image/computer/e/k/t/hp-notebook-400x400-imaebuhsgpwqf7tw.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(1,2,6,28990,"Lenovo G50-80 80E5038NIN","http://img5a.flixcart.com/image/computer/4/q/a/lenovo-notebook-400x400-imaec5sfgznhqjyn.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(1,2,7,28399,"Dell Inspiron 3542","http://img5a.flixcart.com/image/computer/w/w/b/dell-inspiron-notebook-400x400-imadzytzdxdtzyq7.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(1,2,8,19490,"Dell Inspiron 3551 Notebook","http://img6a.flixcart.com/image/computer/d/t/3/dell-inspiron-notebook-400x400-imae8z63jqzv5cdh.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(1,3,9,11990,"Samsung 22F5100","http://img5a.flixcart.com/image/television/k/x/g/samsung-22f5100-400x400-imadub5vtkkhzzhe.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(1,3,10,8990,"Panasonic TH-19C400DX","http://img5a.flixcart.com/image/television/n/p/z/panasonic-th-19c400dx-400x400-imaeba8haczpgmgm.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(1,3,1,39999,"Panasonic TH-19C400DX","http://img6a.flixcart.com/image/television/q/x/f/onida-platinum-leo5000f-400x400-imaea7aegtat2gyx.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(1,3,2,54990,"LG 49LF540A","http://img6a.flixcart.com/image/television/d/z/g/lg-49lf540a-400x400-imae8nynpxsh37bx.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(1,4,3,53550,"Nikon D7000","http://img6a.flixcart.com/image/camera/v/u/g/nikon-d7000-dslr-400x400-imaeyxfajacx9rm2.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(1,4,4,26869,"Sony SLT-A58K","http://img6a.flixcart.com/image/camera/8/j/g/sony-slt-a58k-slr-400x400-imadknzgh5erzrc9.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(1,4,5,27677,"Nikon D5200","http://img5a.flixcart.com/image/camera/s/h/y/nikon-d5200-dslr-400x400-imaeyxfaq5qmz4tb.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(1,4,6,22879,"Nikon D3200 ","http://img5a.flixcart.com/image/camera/s/4/g/nikon-d3200-dslr-400x400-imaeyxfayjnxjvg9.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,5,7,1609,"Puma Lynus DP","http://img5a.flixcart.com/image/shoe/b/y/d/imperial-blue-dandelion-lynus-dp-puma-7-400x400-imae8hb2ghtme8du.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,5,8,499,"Wonker SR-0026 ","http://img6a.flixcart.com/image/shoe/n/z/j/blue-d-0037-blue-vajazzle-9-400x400-imaefq2yhrzfhgwx.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,5,9,449,"Globalite Stumble","http://img6a.flixcart.com/image/shoe/s/n/q/black-grey-green-stumble-globalite-7-400x400-imaebxyssyyhuf93.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,5,10,374,"Globalite Stumble","http://img5a.flixcart.com/image/shoe/y/8/k/navy-red-grey-stumble-globalite-7-400x400-imaebxysj68hhfw8.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,6,1,725,"United Colors of Benetton Basic I Flip Flops","http://img5a.flixcart.com/image/slipper-flip-flop/z/d/f/901-14p8cffcr001i-united-colors-of-benetton-42-euro-400x400-imae3zf83gkubeha.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,6,2,600,"Sparx Slippers","http://img5a.flixcart.com/image/slipper-flip-flop/r/s/u/white-sf0525g-sf2-525-sparx-9-400x400-imadxzjwz9f43avp.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,6,3,1000,"Puma Luca Men S Slippers","http://img5a.flixcart.com/image/slipper-flip-flop/f/y/g/blueprint-luca-men-s-puma-8-400x400-imaea4bwn3tyjkfc.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,6,4,876,"Stylar Black New Virat Flip Flops","http://img5a.flixcart.com/image/slipper-flip-flop/c/x/a/black-2-801-stylar-6-400x400-imae2ejbbzpaghkp.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,7,5,725,"Sparx Men Sandals","http://img5a.flixcart.com/image/sandal/e/v/u/black-black-ss-101-sparx-9-400x400-imadk6quwyhwujah.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,7,6,876,"Bacca Bucci Men Sandals","http://img6a.flixcart.com/image/sandal/j/g/p/olive-bbme6016-bacca-bucci-9-400x400-imae8yz2fbgvnfjc.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,7,7,555,"Fila Roque Men Sandals","http://img5a.flixcart.com/image/sandal/a/f/u/gry-lt-gry-roque-fila-11-400x400-imae6pnhphjkhha2.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,7,8,878,"Puma Faas sandal Ind. Men Sandals","http://img5a.flixcart.com/image/sandal/f/w/b/02-black-coffee-tigerlily-305235-puma-11-400x400-imae3ym68hpgcge6.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,8,9,5999,"Fluid FL101","http://img6a.flixcart.com/image/watch/r/x/z/fl101-white-fluid-400x400-imaeyut2pnbaej8s.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,8,10,3235,"Fastrack 38013PP01 ","http://img5a.flixcart.com/image/watch/e/z/j/38013pp01-fastrack-400x400-imae2dhygysfevfy.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,8,1,2925,"Titan 9322SL03","http://img6a.flixcart.com/image/watch/n/y/v/9322sl03-titan-400x400-imadmh7pbxzkfpzh.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,8,2,2300,"Timex MF13","http://img5a.flixcart.com/image/watch/q/z/h/mf13-timex-400x400-imaefptnezey5ehy.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,9,3,399,"Floyd Classic","http://img5a.flixcart.com/image/sunglass/z/q/j/w123-g-mtl-grey-blk-floyd-m-400x400-imae63svywkyr7va.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,9,4,1200,"Van Heusen Wayfarer","http://img6a.flixcart.com/image/sunglass/4/t/y/vh237-c2-van-heusen-53-400x400-imadxmcmesxqjrfu.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,9,5,8490,"Ray Ban Aviator","http://img5a.flixcart.com/image/sunglass/2/n/q/0rb3025jm168-4e58-ray-ban-58-400x400-imaeazzag335dpxs.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(2,9,6,2999,"Petrol Wrap-around","http://img5a.flixcart.com/image/sunglass/e/f/f/p6006-red-petrol-free-size-400x400-imae4syxhfg9myqe.jpeg");


insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(4,15,7,959,"Toyhouse Speed Helicopter","http://img5a.flixcart.com/image/remote-control-toy/e/v/g/toyhouse-speed-helicopter-400x400-imadxhwgsf9mqhaz.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(4,15,8,650,"Phoenix Buggati Veyron Sports Coupe","http://img6a.flixcart.com/image/remote-control-toy/e/b/u/phoenix-buggati-veyron-sports-coupe-400x400-imadycw8zxddve5d.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(4,15,9,1199,"Toyzstation 37 Key Electronic Keyboard with Adaptor","http://img6a.flixcart.com/image/musical-toy/g/t/5/toyzstation-37-key-electronic-keyboard-with-adaptor-400x400-imae5h5gfkuzshmd.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(4,15,10,1199,"Toynation Jazz Drum 7 Pcs","http://img5a.flixcart.com/image/musical-toy/m/n/z/toynation-jazz-drum-7-pcs-with-stool-400x400-imae7yfafxyhhwta.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(4,16,1,989,"US Polo Boy's Jeans","http://img5a.flixcart.com/image/jean/d/w/s/ujjn5091me-blue-us-polo-9-10-years-400x400-imae9rzmxfnwrgts.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(4,16,4,1399,"US Polo Boy's Checkered","http://img6a.flixcart.com/image/shirt/c/z/b/ujsh5299burgundy-us-polo-9-10-years-400x400-imae9rwj2xg9uuxs.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(4,17,7,599,"Tweety Girl's T-Shirt","http://img5a.flixcart.com/image/t-shirt/w/s/x/tw0dgt838white-slub-tweety-400x400-imae8fdpz9mgte87.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(4,17,8,4490,"Magic Fairy Girl's Gathered Dress","http://img6a.flixcart.com/image/dress/w/t/n/36-24-mf-307black-rose-magic-fairy-400x400-imadyz5qwnwmbykp.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(4,18,9,1095,"Zebra Kids Boys Sandals","http://img6a.flixcart.com/image/sandal/t/e/w/yellow-15016-zebra-kids-21-400x400-imae94mfvh96jyfx.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(4,18,10,995,"Zebra Kids Yellow Loafers","http://img5a.flixcart.com/image/shoe/p/m/w/yellow-14716-zebra-kids-35-400x400-imae6kzmxzfcu8fz.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(4,19,3,1078,"Native Howard Shoes","http://img5a.flixcart.com/image/shoe/8/y/2/galaxy-blue-raincoat-yellow-hwcgbrys14-native-11-400x400-imadvyfmkh4udweb.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(4,19,4,199,"Zachho Girls Flats","http://img5a.flixcart.com/image/sandal/w/r/8/black-hc02-zachho-7-400x400-imae2uxkmnedd3ce.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(5,20,7,28700,"Durian Berry Solid Wood 3 Seater Sofa","http://img6a.flixcart.com/image/sofa-sectional/b/s/j/berry-55001-c-3-plywood-durian-beige-beige-400x400-imae88khhxahne9v.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(5,20,8,57645,"hometown Belmont Rhs Fabric 6 Seater Sectional","http://img6a.flixcart.com/image/sofa-sectional/z/v/m/6000020207001-semi-aniline-leather-hometown-brown-brown-400x400-imae94v2svyh3qyn.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(5,21,1,47145,"hometown Urbana Engineered Wood Queen Bed With Storage","http://img5a.flixcart.com/image/bed/3/j/7/830006474001-king-mdf-hometown-na-white-400x400-imae9fcz9h9awzfz.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(5,21,4,31500,"Durian Krish Engineered Wood King Bed With Storage","http://img5a.flixcart.com/image/bed/z/r/q/krish-56005-a-king-particle-board-durian-wenge-400x400-imae92hjzghnztde.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(5,22,7,9240,"Royal Oak Engineered Wood Dining Set","http://img5a.flixcart.com/image/dining-set/z/h/r/dt71nt-4-4-seater-mdf-royal-oak-na-honey-brown-400x400-imaeajwwm6zcbr2z.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(5,22,8,15645,"HomeTown Vento Metal Dining Set","http://img5a.flixcart.com/image/dining-set/f/h/h/830002366001-4-seater-carbon-steel-hometown-black-black-400x400-imae8z43fh4skr5h.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(5,23,9,3499,"Vishwakarma Furniture Solid Wood Coffee Table","http://img6a.flixcart.com/image/coffee-table/q/7/w/t03-mdf-vishwakarma-furniture-black-400x400-imaeaayr9kuzmgty.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(5,23,2,2290,"Wood An Wood Engineered Wood Coffee Table","http://img5a.flixcart.com/image/coffee-table/k/y/h/1-particle-board-wood-an-wood-coffee-400x400-imae7uvzqsf4ynan.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(6,24,3,249,"inferno","http://static01.digital.flipkart.com/cds/ebooks/samplereader/explodecontent/downloadcontent/DIGI2-9f7d060b-20c1-4931-bff6-7fa3330facf9-book.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(6,24,6,2162,"The Lands of Ice and Fire (a Game of Thrones)","http://img5a.flixcart.com/image/book/5/4/3/the-lands-of-ice-and-fire-a-game-of-thrones-400x400-imadfba7hfccx5z4.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(6,25,7,419,"Avengers : Age Of Ultron","http://img6a.flixcart.com/image/av-media/movies/t/a/4/avengers-age-of-ultron-400x400-imaebgfq93q3bskf.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(6,25,10,339,"Tanu Weds Manu Returns","http://img5a.flixcart.com/image/av-media/movies/z/p/q/tanu-weds-manu-returns-400x400-imae92j8gxhpzhvs.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(6,26,1,371,"King Of Pop - The Indian Collection","http://img6a.flixcart.com/image/av-media/music/d/j/c/king-of-pop-the-indian-collection-400x400-imadawmerdfakzpz.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(6,26,4,474,"X (Deluxe Edition)","http://img5a.flixcart.com/image/av-media/music/k/q/q/x-400x400-imadyyzgcyaz5fby.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(7,27,7,5499,"Sony Xplod CDX-G1150U Car Media Player","http://img6a.flixcart.com/image/car-media-player/p/p/a/cdx-g1150u-sony-400x400-imaea47mq2tmc9ca.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(7,27,8,12792,"Sony XAV-65 Car Media Player","http://img5a.flixcart.com/image/car-media-player/s/h/q/xav-65-sony-400x400-imaecf5v48drzyy3.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(7,28,9,315,"STP 51200EN Petrol Treatment Synthetic Blend Motor Oils","http://img6a.flixcart.com/image/vehicle-lubricant/u/v/h/51200en-stp-200-400x400-imae4dhdd2zwjgcg.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(7,28,2,275,"STP 95300EN Radiator Flush Filter Oil","http://img6a.flixcart.com/image/vehicle-lubricant/u/j/w/95300en-stp-300-400x400-imae82y8bg4zfwup.jpeg");

insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(7,29,3,1214,"Vega Crux Motorbike Helmet - M","http://img5a.flixcart.com/image/helmet/2/n/d/1075-1-vega-58-full-face-crux-400x400-imae22bhgabftjch.jpeg");
insert into product(cat_id,sub_cat_id,seller_id,price,product_name,pimage) values(7,29,6,895,"Studds Chrome Elite Motorsports Helmet - L","http://img6a.flixcart.com/image/helmet/p/z/c/8902613973011-studds-58-full-face-chrome-elite-400x400-imaea8szjvzvsgff.jpeg");




create table orders(
customer_id int(10) not null,
product_id int(10) not null,
order_no int(10) auto_increment primary key not null,

foreign key(customer_id) references customer_login (customer_id),
foreign key (product_id) references product(product_id)

);

create table request_table(
request_type varchar(32),
product_id int(10),
price int(10),
product_name varchar(32),
cat_id int(10),
sub_cat_id int(10),name varchar(32),
seller_id int(10),
foreign key(cat_id) references category(cat_id), 
foreign key(sub_cat_id) references sub_category(sub_cat_id),
foreign key(seller_id) references seller_login(seller_id)
);

create table admin_login(
username varchar(50) not null,
password varchar(50)
);


insert into admin_login values ("admin","admin123");

create table add_to_cart(
product_id int(10) primary key not null,
seller_id int(10),
qty int,
price int,
customer_id int(10) not null,
foreign key(customer_id) references customer_login (customer_id),
foreign key (product_id) references product (product_id),
foreign key (seller_id) references seller_login (seller_id)
);

create table mobiles_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	color varchar(32),
	front_camera varchar(32),
	rear_camera varchar(32),
	screen_size varchar(32),
	battery varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into mobiles_specs(sub_cat_id,product_id,brand,color,front_camera,rear_camera,screen_size,battery) values(1,1,"apple","white","3MP","8MP","4.7","Li-Po 1810 mAh");
insert into mobiles_specs(sub_cat_id,product_id,brand,color,front_camera,rear_camera,screen_size,battery) values(1,2,"micrpomax","black","2MP","13MP","4.2","Li-Po 1710 mAh");
insert into mobiles_specs(sub_cat_id,product_id,brand,color,front_camera,rear_camera,screen_size,battery) values(1,3,"motorola","light black","1.5MP","10MP","4.4","Li-Po 2810 mAh");
insert into mobiles_specs(sub_cat_id,product_id,brand,color,front_camera,rear_camera,screen_size,battery) values(1,4,"Samsung","Grey","2MP","12MP","5.0","Li-Po 1110 mAh");


create table laptops_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	color varchar(32),
	screen_size varchar(32),
	ram varchar(32),
	battery varchar(32),
	processor varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into laptops_specs(sub_cat_id,product_id,brand,color,screen_size,ram,battery,processor) values(2,5,"HP","white","14.3","2GB","9 Cell 7800mAh","i3");
insert into laptops_specs(sub_cat_id,product_id,brand,color,screen_size,ram,battery,processor) values(2,6,"Lenovo","black","15.1","6GB","6 Cell 5800mAh","i5");
insert into laptops_specs(sub_cat_id,product_id,brand,color,screen_size,ram,battery,processor) values(2,7,"Dell","grey","14.0","4GB","12 Cell 9800mAh","i7");
insert into laptops_specs(sub_cat_id,product_id,brand,color,screen_size,ram,battery,processor) values(2,8,"Dell","white","15.6","8GB","9 Cell 8800mAh","i3");






create table televisions_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	type varchar(32),
	screen_size varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into televisions_specs(sub_cat_id,product_id,brand,type,screen_size) values(3,9,"samsung","LED","55cm");
insert into televisions_specs(sub_cat_id,product_id,brand,type,screen_size) values(3,10,"panasonic","LED","47cm");
insert into televisions_specs(sub_cat_id,product_id,brand,type,screen_size) values(3,11,"onida","LED","123cm");
insert into televisions_specs(sub_cat_id,product_id,brand,type,screen_size) values(3,12,"LG","LED","125cm");

create table cameras_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	type varchar(32),
	screen_size varchar(32),
	mp varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into cameras_specs(sub_cat_id,product_id,brand,type,screen_size,mp) values(4,13,"Nikon","DSLR","3inch LCD","16.2");
insert into cameras_specs(sub_cat_id,product_id,brand,type,screen_size,mp) values(4,14,"Sony","DSLR","2.7inch LCD","20.1");
insert into cameras_specs(sub_cat_id,product_id,brand,type,screen_size,mp) values(4,15,"Nikon","DSLR","3inch LCD","24.1");
insert into cameras_specs(sub_cat_id,product_id,brand,type,screen_size,mp) values(4,16,"Nikon","DSLR","3inch LCD","24.2");


create table shoes_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	color varchar(32),
	size varchar(32),
	type varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into shoes_specs(sub_cat_id,product_id,brand,color,size,type) values(5,17,"puma","blue","7","sneakers");
insert into shoes_specs(sub_cat_id,product_id,brand,color,size,type) values(5,18,"wonker","black","8","casual");
insert into shoes_specs(sub_cat_id,product_id,brand,color,size,type) values(5,19,"globalite stimulate","black","9","walking");
insert into shoes_specs(sub_cat_id,product_id,brand,color,size,type) values(5,20,"globalite stimulate","dark blue","6","walking");








create table slippers_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	color varchar(32),
	size varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into slippers_specs(sub_cat_id,product_id,brand,color,size) values(6,21,"UCD","black","6");
insert into slippers_specs(sub_cat_id,product_id,brand,color,size) values(6,22,"Sparx","grey","7");
insert into slippers_specs(sub_cat_id,product_id,brand,color,size) values(6,23,"Puma","blue","8");
insert into slippers_specs(sub_cat_id,product_id,brand,color,size) values(6,24,"Stylar","black","9");




create table sandals_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	color varchar(32),
	size varchar(32),
	occasion varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into sandals_specs(sub_cat_id,product_id,brand,color,size) values(7,25,"sparx","black","9");
insert into sandals_specs(sub_cat_id,product_id,brand,color,size) values(7,26,"bacca bucci","brown","6");
insert into sandals_specs(sub_cat_id,product_id,brand,color,size) values(7,27,"fila","grey","8");
insert into sandals_specs(sub_cat_id,product_id,brand,color,size) values(7,28,"puma","black","7");



create table watches_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	type varchar(32),
	dial_shape varchar(32),
	dial_color varchar(32),
	strap_color varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into watches_specs(sub_cat_id,product_id,brand,type,dial_shape,dial_color,strap_color) values(8,29,"fluid","analog","round","blue","silver");
insert into watches_specs(sub_cat_id,product_id,brand,type,dial_shape,dial_color,strap_color) values(8,30,"fastrack","digital","round","black","black");
insert into watches_specs(sub_cat_id,product_id,brand,type,dial_shape,dial_color,strap_color) values(8,31,"titan","analog","round","white","brown");
insert into watches_specs(sub_cat_id,product_id,brand,type,dial_shape,dial_color,strap_color) values(8,32,"timex","digital","round","beige","brown");


create table sunglasses_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	category varchar(32),
	uv_protection varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into sunglasses_specs(sub_cat_id,product_id,brand,category,uv_protection) values(9,33,"floyd","aviator","yes");
insert into sunglasses_specs(sub_cat_id,product_id,brand,category,uv_protection) values(9,34,"van heusen","wayfrarer","no");
insert into sunglasses_specs(sub_cat_id,product_id,brand,category,uv_protection) values(9,35,"ray ban","aviator","no");
insert into sunglasses_specs(sub_cat_id,product_id,brand,category,uv_protection) values(9,36,"petrol","wrap-round","yes");


create table toys_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	category varchar(32),
	age_group varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)
);

insert into toys_specs(sub_cat_id,product_id,brand,category,age_group) values(15,37,"toyhouse","remote controlled","4-7");
insert into toys_specs(sub_cat_id,product_id,brand,category,age_group) values(15,38,"phoenix","remote controlled","5-9");
insert into toys_specs(sub_cat_id,product_id,brand,category,age_group) values(15,39,"toynation","musical","7-11");
insert into toys_specs(sub_cat_id,product_id,brand,category,age_group) values(15,40,"toynation","musical","6-10");



create table boys_clothing_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	size varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into boys_clothing_specs(sub_cat_id,product_id,brand,size) values(16,41,"us polo","M");
insert into boys_clothing_specs(sub_cat_id,product_id,brand,size) values(16,42,"us polo","M");




create table girls_clothing_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	size varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into girls_clothing_specs(sub_cat_id,product_id,brand,size) values(17,43,"puma","S");
insert into girls_clothing_specs(sub_cat_id,product_id,brand,size) values(17,44,"UCD","S");


create table boys_footware_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	size int(10),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into boys_footware_specs(sub_cat_id,product_id,brand,size) values(18,45,"Zebra",4);
insert into boys_footware_specs(sub_cat_id,product_id,brand,size) values(18,46,"Zebra",5);

create table girls_footware_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	size int(10),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into girls_footware_specs(sub_cat_id,product_id,brand,size) values(19,47,"Native",6);
insert into girls_footware_specs(sub_cat_id,product_id,brand,size) values(19,48,"Zachho",5);


create table sofas_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	seating_capacity int(10),
	configuration varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into sofas_specs(sub_cat_id,product_id,brand,seating_capacity) values(20,49,"Durian",4);
insert into sofas_specs(sub_cat_id,product_id,brand,seating_capacity) values(20,50,"hometown",10);


create table beds_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	size varchar(32),
	color varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);


insert into beds_specs(sub_cat_id,product_id,brand,size,color) values(21,51,"hometown","king","white");
insert into beds_specs(sub_cat_id,product_id,brand,size,color) values(21,52,"durain","king","brown");

create table dining_table_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	color varchar(32),
	style varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into dining_table_specs(sub_cat_id,product_id,brand,color,style) values(22,53,"Royal","brown","wood");
insert into dining_table_specs(sub_cat_id,product_id,brand,color,style) values(22,54,"Hometown","black","metal");



create table center_table_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	color varchar(32),
	type varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into center_table_specs(sub_cat_id,product_id,brand,color,type) values(23,55,"Vishwakarma","black","Coffee table");
insert into center_table_specs(sub_cat_id,product_id,brand,color,type) values(23,56,"Wood","brown","coffee table");

create table literature_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	publications varchar(32),
	author varchar(32),
	type_of_book varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into literature_specs(sub_cat_id,product_id,publications,author,type_of_book) values(24,57,"Wall Street Journal","dan brown","Thriller");
insert into literature_specs(sub_cat_id,product_id,publications,author,type_of_book) values(24,58,"random house","George R.R. Martin","Fantasy");

create table movies_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	genre varchar(32),
	language varchar(32),
	format varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into movies_specs(sub_cat_id,product_id,genre,language,format) values(25,59,"Action","English","MP4");
insert into movies_specs(sub_cat_id,product_id,genre,language,format) values(25,60,"Comedy","Hindi","MP4");




create table music_cd_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	artist varchar(32),
	format varchar(32),
	language varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into music_cd_specs(sub_cat_id,product_id,artist,format,language) values(26,61,"Michael Jackson","MP3","English");
insert into music_cd_specs(sub_cat_id,product_id,artist,format,language) values(26,62,"Ed Sheeran","MP3","English");





create table car_accesories_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	vehicle_brand varchar(32),
	vehicle_model_year varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into car_accesories_specs(sub_cat_id,product_id,brand,vehicle_brand,vehicle_model_year) values(27,63,"Sony","maruti","2013");
insert into car_accesories_specs(sub_cat_id,product_id,brand,vehicle_brand,vehicle_model_year) values(27,64,"Sony","hyundai","2014");



create table lubrication_and_oil_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	vehicle_brand varchar(32),
	vehicle_model_year int(10),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into lubrication_and_oil_specs(sub_cat_id,product_id,brand,vehicle_brand,vehicle_model_year) values(28,65,"STP","audi","2014");
insert into lubrication_and_oil_specs(sub_cat_id,product_id,brand,vehicle_brand,vehicle_model_year) values(28,66,"STP","BMW","2015");



create table helmet_specs(
	sub_cat_id int(10),
	product_id int(10) primary key,
	brand varchar(32),
	foreign key(sub_cat_id) references sub_category(sub_cat_id),
	foreign key (product_id) references product(product_id)

);

insert into helmet_specs(sub_cat_id,product_id,brand) values(29,67,"vega");
insert into helmet_specs(sub_cat_id,product_id,brand) values(29,68,"studds");




create table r_mobiles_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	color varchar(32),
	front_camera varchar(32),
	rear_camera varchar(32),
	screen_size varchar(32),
	battery varchar(32)

);

create table r_laptops_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	color varchar(32),
	screen_size varchar(32),
	ram varchar(32),
	battery varchar(32),
	processor varchar(32)

);

create table r_cameras_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	type varchar(32),
	zoom varchar(32),
	color varchar(32),
	screen_size varchar(32),
	camera_resolution varchar(32)

);

create table r_televisions_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	type varchar(32),
	screen_size varchar(32)

);

create table r_shoes_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	color varchar(32),
	size  int(10),
	type varchar(32),
	occasion varchar(32)

);

create table r_slippers_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	color varchar(32),
	size int (10),
	occasion varchar(32),
	type varchar(32)

);

create table r_sandals_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	color varchar(32),
	size int(10),
	occasion varchar(32)
);

create table r_watches_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	type varchar(32),
	dial_shape varchar(32),
	dial_color varchar(32),
	strap_material varchar(32),
	strap_color varchar(32)

);

create table r_sunglasses_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	category varchar(32),
	frame_material varchar(32),
	frame_color varchar(32),
	face_shape varchar(32)

);

create table r_toys_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	cateory varchar(32),
	age_group varchar(32),
	color varchar(32)
);

create table r_boys_clothing_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	color varchar(32),
	size int(10),
	age_group varchar(32),
	type varchar(32)

);

create table r_girls_clothing_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	color varchar(32),
	size int(10),
	age_group varchar(32),
	type varchar(32)

);

create table r_boys_footware_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	color varchar(32),
	size int(10),
	age_group varchar(32)

);

create table r_girls_footware_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	color varchar(32),
	size int(10),
	age_group varchar(32)

);

create table r_sofas_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	seating_capacity int(10),
	configuration varchar(32)

);

create table r_beds_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	size varchar(32),
	type varchar(32),
	color varchar(32)

);

create table r_dining_table_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	color varchar(32),
	style varchar(32)

);


create table r_center_table_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	color varchar(32),
	type varchar(32),
	shape varchar(32)

);

create table r_literature_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	publications varchar(32),
	author varchar(32),
	type_of_book varchar(32)

);

create table r_movies_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	genre varchar(32),
	language varchar(32),
	format varchar(32)

);

create table r_music_cd_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	artist varchar(32),
	format varchar(32),
	language varchar(32)

);

create table r_car_accesories_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	vehicle_brand varchar(32),
	vehicle_model_year varchar(32)

);

create table r_lubrication_and_oil_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	vehicle_brand varchar(32),
	vehicle_model_year varchar(32)

);

create table r_helmet_specs(
	sub_cat_id int(10),
	name varchar(32),
	
	brand varchar(32),
	type varchar(32),
	discount varchar(32)

);
create table product_rating(
	product_id int(10) primary key,
	rating int(10),
	count int(10),
	foreign key (product_id) references product(product_id)
);	