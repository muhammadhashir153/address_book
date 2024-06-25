SET FOREIGN_KEY_CHECKS=0;



CREATE TABLE `cart` (
  `cr_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `cr_quantity` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cr_id`),
  KEY `p_id` (`p_id`),
  KEY `u_id` (`u_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `products` (`p_id`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `user_account` (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `categories` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO categories VALUES("9","Engagement Rings");
INSERT INTO categories VALUES("11","Weddings Bands");
INSERT INTO categories VALUES("12","Necklaces");
INSERT INTO categories VALUES("13","Earrings");
INSERT INTO categories VALUES("14","Bracelets");
INSERT INTO categories VALUES("15","Skincare");
INSERT INTO categories VALUES("16","Makeup");
INSERT INTO categories VALUES("17","Fragrances");
INSERT INTO categories VALUES("18","Haircare");
INSERT INTO categories VALUES("19","Bodycare");



CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  KEY `o_id` (`o_id`),
  CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `orders` (`o_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO order_items VALUES("28","33","18","1");
INSERT INTO order_items VALUES("29","33","35","1");
INSERT INTO order_items VALUES("30","34","33","1");
INSERT INTO order_items VALUES("31","35","9","5");



CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `invoice_num` varchar(255) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`o_id`),
  UNIQUE KEY `invoice_num` (`invoice_num`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO orders VALUES("33","2","INV-13281","2024-06-24 15:28:41");
INSERT INTO orders VALUES("34","2","INV-792775","2024-06-24 15:56:08");
INSERT INTO orders VALUES("35","2","INV-888953","2024-06-25 01:59:24");



CREATE TABLE `products` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(255) DEFAULT NULL,
  `p_image` varchar(255) DEFAULT NULL,
  `p_price` varchar(255) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `p_stock` int(11) DEFAULT NULL,
  `p_desc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`p_id`),
  KEY `c_id` (`c_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `categories` (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO products VALUES("8","Classic Solitaire Diamond Ring","1718444426Classic Solitaire Diamond Ring.png","10","9","100","Discover our exquisite engagement rings, featuring ethically sourced diamonds and customizable designs in premium materials, handcrafted to perfection for a timeless celebration of love.");
INSERT INTO products VALUES("9","Vintage Halo Engagement Ring","1718444749Vintage Halo Engagement Ring.png","15","9","56","Our Vintage Halo Engagement Ring features a stunning central diamond encircled by a halo of smaller diamonds, set in an intricately designed band, evoking timeless elegance and romance.");
INSERT INTO products VALUES("10","Three-Stone Engagement Ring","1718444871Three-Stone Engagement Ring.png","35","9","25","Our Three-Stone Engagement Ring showcases a trio of dazzling diamonds symbolizing your past, present, and future, set in a beautifully crafted band for a timeless and elegant look.");
INSERT INTO products VALUES("11","Emerald-Cut Diamond Ring","1718445007Emerald-Cut Diamond Ring.png","76","9","124","Our Emerald-Cut Diamond Ring features a stunning emerald-cut diamond, renowned for its timeless elegance and sophisticated sparkle, set in a sleek, handcrafted band.");
INSERT INTO products VALUES("12","Pear-Shaped Diamond Ring","1718445111Pear-Shaped Diamond Ring.png","65","9","15","Our Pear-Shaped Diamond Ring boasts a brilliant pear-shaped diamond, blending the elegance of a round cut with the sophistication of a marquise, set in a meticulously handcrafted band.");
INSERT INTO products VALUES("13","Classic Gold Band","1718445356pngwing.com (6).png","10","11","56","Our Classic Gold Band offers timeless simplicity and enduring elegance, crafted from high-quality 14K or 18K gold. This sleek, polished ring is the perfect symbol of everlasting love and commitment.");
INSERT INTO products VALUES("14","Diamond Eternity Band","1718445497pngwing.com (7).png","85","11","40","Our Diamond Eternity Band features a continuous circle of dazzling diamonds, symbolizing eternal love and commitment, set in a meticulously crafted band.");
INSERT INTO products VALUES("15","Twisted Infinity Band","1718445583pngwing.com (8).png","89.99","11","50","Our Twisted Infinity Band showcases a unique intertwining design, symbolizing eternal love and unity, crafted from high-quality precious metals.");
INSERT INTO products VALUES("16","Celtic Knot Band","1718445674pngwing.com (9).png","70","11","12","Our Celtic Knot Band features an intricate knot design symbolizing eternal love and interconnectedness, handcrafted from high-quality precious metals.");
INSERT INTO products VALUES("17","Rose Gold Comfort Fit Band","1718445921pngwing.com (10).png","85","11","30","Our Rose Gold Comfort Fit Band offers a blend of elegance and comfort, crafted from luxurious rose gold. This band is designed for a seamless fit and timeless style, perfect for celebrating enduring love and commitment.");
INSERT INTO products VALUES("18","Diamond Pendant Necklace","1718446116pngwing.com (11).png","90","12","34","Our Diamond Pendant Necklace showcases a brilliant diamond suspended from a delicate chain, crafted with elegance and sophistication in mind.");
INSERT INTO products VALUES("19","Pearl Strand Necklace","1718446260pngwing.com (12).png","95","12","40","Our Pearl Strand Necklace features a lustrous collection of pearls, elegantly strung together for a classic and sophisticated look.");
INSERT INTO products VALUES("20","Heart Locket Necklace","1718446412pngwing.com (13).png","85","12","10","Our Heart Locket Necklace exudes sentimental charm, featuring a polished locket adorned with intricate designs and capable of holding cherished keepsakes close to the heart.");
INSERT INTO products VALUES("21","Infinity Symbol Necklace","1718446644pngwing.com (14).png","90","12","55","Our Infinity Symbol Necklace elegantly embodies eternal love and unity with its graceful design crafted from premium materials.");
INSERT INTO products VALUES("22","Gemstone Cluster Necklace","1718446783pngwing.com (15).png","40","12","12","Our Gemstone Cluster Necklace dazzles with a radiant array of vibrant gemstones intricately arranged in a captivating cluster design.");
INSERT INTO products VALUES("23","Diamond Stud Earrings","1718446878pngwing.com (16).png","15","13","100","Our Diamond Stud Earrings feature exquisite round-cut diamonds set in classic prong or bezel settings, crafted from premium materials for timeless elegance and brilliance.");
INSERT INTO products VALUES("25","Hoops Earrings","1718447270pngwing.com (17).png","45","13","58","Our Hoop Earrings showcase a sleek and versatile design crafted from high-quality materials, offering timeless style and effortless elegance.");
INSERT INTO products VALUES("26","Pearl Earrings","1718447376pngwing.com (18).png","50","13","20","Our Pearl Earrings exude timeless sophistication with lustrous pearls elegantly set in high-quality materials.");
INSERT INTO products VALUES("27","Chandelier Earrings","1718447755pngwing.com (19).png","80","13","35","Our Chandelier Earrings radiate opulence with their cascading design adorned with intricate patterns and sparkling gemstones or crystals.");
INSERT INTO products VALUES("28","Tennis Bracelet","1718447914pngwing.com (20).png","70","14","45","Our Tennis Bracelet epitomizes timeless elegance with a continuous row of meticulously matched diamonds or gemstones, set in a delicate and durable precious metal.");
INSERT INTO products VALUES("29","Charm Bracelet","1718448065pngwing.com (21).png","250","14","51","Our Charm Bracelet captures personal style and sentimentality with a collection of intricately designed charms, each symbolizing cherished memories or interests. ");
INSERT INTO products VALUES("30","Bangle Set","1718448473pngwing.com (22).png","45","14","90","Our Bangle Set features a curated collection of sleek and stylish bracelets, crafted from premium materials and designed to be worn together or separately for versatile elegance");
INSERT INTO products VALUES("31","Cuff Bracelet","1718448625pngwing.com (23).png","160","14","50","Our Cuff Bracelet showcases a bold and contemporary design, crafted from high-quality materials for a statement of elegance and individuality.");
INSERT INTO products VALUES("32","Leather Wrap Bracelet","1718448846pngwing.com (24).png","10","14","100","Our Leather Wrap Bracelet combines rugged charm with refined craftsmanship, featuring supple leather intricately woven and adorned with sleek metal accents. Versatile and stylish");
INSERT INTO products VALUES("33","Hydrating Face Cleanser","1718485553pngwing.com.png","20","15","100","A hydrating face cleanser is a skincare product designed to effectively cleanse the face while also providing hydration.");
INSERT INTO products VALUES("35","Moisturizing Day Cream","1718486217pngwing.com (2).png","40","15","55","A moisturizing day cream is a skincare product designed to hydrate and nourish the skin during the day. ");
INSERT INTO products VALUES("36","Night Repair Cream","1718486395pngwing.com (3).png","60","14","60","A night repair cream is a specialized skincare product designed to rejuvenate and repair the skin overnight. ");
INSERT INTO products VALUES("37","Vitamin C Serum","1718486506pngwing.com (4).png","50","15","66","Vitamin C serum has become increasingly popular in skincare routines due to its numerous benefits for the skin.");
INSERT INTO products VALUES("38","Exfoliating Scrub","1718486635pngwing.com (5).png","40","15","59","An exfoliating scrub is a skincare product used to remove dead skin cells from the surface of the skin, revealing smoother and brighter skin underneath.");
INSERT INTO products VALUES("39","Liquid Foundation","1718486749pngwing.com (6).png","90","16","40","iquid foundation is a versatile makeup product used to create an even skin tone and provide coverage for imperfections.");
INSERT INTO products VALUES("40","Matte Lipstick","1718486867pngwing.com (7).png","100","16","120",": Matte lipsticks have a flat, non-glossy finish that appears velvety on the lips. This finish is achieved through the absence of shimmer or gloss particles.");
INSERT INTO products VALUES("41","Eyeshadow Palette","1718486944pngwing.com (8).png","200","16","100","An eyeshadow palette is a collection of multiple eyeshadow colors grouped together in one compact or palette. ");
INSERT INTO products VALUES("42","Volumizing Mascara","1718487065pngwing.com (9).png","150","16","70","Volumizing mascara is a type of mascara specifically formulated to add volume and thickness to eyelashes.");
INSERT INTO products VALUES("43","Blush Compact","1718487206pngwing.com (10).png","250","16","40","\r\n\r\nA blush compact is a makeup product designed to add color to the cheeks, enhancing the complexion with a healthy glow. ");
INSERT INTO products VALUES("44","Floral Bouquet Perfume","1718487415pngwing.com (11).png","250","17","100","Floral Bouquet Perfume typically refers to a fragrance that combines various floral notes to create a harmonious and pleasing scent reminiscent of a bouquet of flowers. These perfumes often blend different types of floral essences such as rose, jasmine, l");
INSERT INTO products VALUES("45","Citrus Fresh Eau de Toilette","1718487627pngwing.com (12).png","250","17","130","Citrus Fresh Eau de Toilette is a type of fragrance known for its invigorating and refreshing qualities, primarily derived from citrus notes. These perfumes typically feature a blend of citrus fruits such as lemon, lime, orange, grapefruit, bergamot, or m");
INSERT INTO products VALUES("46","Warm Vanilla Perfume","1718488860pngwing.com (13).png","250","17","100","Warm Vanilla Perfume typically features vanilla as its predominant note, but it is characterized by a cozy and comforting warmth rather than the sugary sweetness often associated with vanilla.");
INSERT INTO products VALUES("47","Ocean Breeze Cologne","1718489325pngwing.com (14).png","200","17","150","Ocean Breeze Cologne typically evokes a fresh and invigorating scent reminiscent of the sea and the beach.");
INSERT INTO products VALUES("48","Spicy Oriental Perfume","1718489490pngwing.com (15).png","100","17","160","Spicy Oriental Perfume is a fragrance category known for its exotic and richly aromatic profile.");
INSERT INTO products VALUES("49","Nourishing Shampoo","1718489663pngwing.com (16).png","80","18","200","Nourishing shampoo is designed to provide deep hydration and care for your hair. It typically includes ingredients that replenish moisture strengthen hair follicles and promote overall hair health.");
INSERT INTO products VALUES("50","Deep Conditioning Mask","1718490036pngwing.com (17).png","50","18","200","Hair conditioner is a product used after shampooing to improve the texture appearance and manageability of hair.");
INSERT INTO products VALUES("51","Volumizing Mousse","1718490119pngwing.com (18).png","50","18","100","olumizing mousse is a styling product used to add volume, body, and texture to hair.");
INSERT INTO products VALUES("52","Argan Oil Serum","1718490273pngwing.com (19).png","60","18","150","\r\nArgan oil serum is a hair care product designed to nourish  hydrate and add shine to hair.");
INSERT INTO products VALUES("53","Heat Protectant Spray","1718490451pngwing.com (20).png","90","18","100","A heat protectant spray is a hair care product used to shield hair from damage caused by heat styling tools such as hair dryers  flat irons and curling irons. ");
INSERT INTO products VALUES("54","Exfoliating Body Scrub","1718490557pngwing.com (21).png","70","19","200","An exfoliating body scrub is a skincare product designed to remove dead skin cells and impurities from the surface of the skin leaving it smoother and refreshed. ");
INSERT INTO products VALUES("55","Hydrating Body Lotion","1718490699pngwing.com (22).png","100","19","300","\r\nHydrating body lotion is a skincare product formulated to moisturize and nourish the skin providing essential hydration to keep it soft smooth and supple. ");
INSERT INTO products VALUES("56","Refreshing Body Mist","1718490810pngwing.com (23).png","70","19","250","A refreshing body mist is a light, scented spray designed to provide a quick burst of fragrance and a cooling sensation to the skin. ");
INSERT INTO products VALUES("57","Hand Cream","1718490910pngwing.com (24).png","50","19","300","Hand creams are designed to deeply hydrate the skin on the hands, which tends to be thinner and more prone to dryness than other parts of the body.");
INSERT INTO products VALUES("58","Foot Balm","1718491020pngwing.com (25).png","60","19","100","Foot balm is a specialized skincare product designed to nourish moisturize  and soothe the skin on the feet.");



CREATE TABLE `user_account` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_role` varchar(255) DEFAULT NULL,
  `u_name` varchar(255) DEFAULT NULL,
  `u_email` varchar(255) DEFAULT NULL,
  `u_pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO user_account VALUES("2","admin","Muhammad Hashir","hashir@example.com","$2y$10$pF4D6eoW2DhRZzf5viDPweyI5K726qyZD9UOPxxaQ1uagaJ1TlE32");
INSERT INTO user_account VALUES("4","admin","nabiha","nabiha123@gmail.com","$2y$10$e2H0l0nUvKTLQtboI8FoRe6UovNE/n85byogFrJ3TGCoG/m.nK6da");



CREATE TABLE `user_detail` (
  `ud_id` int(11) NOT NULL AUTO_INCREMENT,
  `ud_name` varchar(255) DEFAULT NULL,
  `ud_adress` varchar(255) DEFAULT NULL,
  `ud_email` varchar(255) DEFAULT NULL,
  `ud_work_num` varchar(255) DEFAULT NULL,
  `ud_phone_num` varchar(255) DEFAULT NULL,
  `ud_dob` varchar(255) DEFAULT NULL,
  `ud_remarks` varchar(255) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ud_id`),
  KEY `u_id` (`u_id`),
  CONSTRAINT `user_detail_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user_account` (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO user_detail VALUES("12","Hashir","ddsaf","hashir123@gmail.com","0314524654","0315121345","2002-03-15","sadfadsfa","2");
INSERT INTO user_detail VALUES("13","Hashir","ddsaf","hashir123@gmail.com","0314524654","0315121345","2002-03-15","sadfadsfa","2");
INSERT INTO user_detail VALUES("14","Hashir","ddsaf","hashir123@gmail.com","0314524654","0315121345","2002-03-15","sadfadsfa","2");
INSERT INTO user_detail VALUES("15","Hashir","ddsaf","hashir123@gmail.com","0314524654","0315121345","2002-03-15","sadfadsfa","2");

SET FOREIGN_KEY_CHECKS=1;