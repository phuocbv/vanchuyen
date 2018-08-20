<?php
// *************************************************************************
// *                                                                       *
// *  DEPRIXA -  Integrated Web system                                     *
// * Copyright (c) JAOMWEB. All Rights Reserved                            *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: osorio2380@yahoo.es                                            *
// * Website: http://www.jaom.info                                         *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// * If you Purchased from Codecanyon, Please read the full License from   *
// * here- http://codecanyon.net/licenses/standard                         *
// *                                                                       *
// *************************************************************************

//**Courier Deprixa Pro - Integrated Web System v3.2.5**//


error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();

$con = conexion();

	//**sql database main menu and footer**//
	
	$query = $con->query("SELECT * FROM w_menu ORDER BY id DESC");
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){
			
			$w_home  			= $row["home"];
			$w_signup  			= $row["signup"];
			$w_track_my_parcel  = $row["track_my_parcel"];
			$w_company  		= $row["company"];
			$w_faq  			= $row["faq"];
			$w_contacs  		= $row["contacs"];
			$w_login  			= $row["login"];
			$w_terms  			= $row["terms"];
			$w_privacy  		= $row["privacy"];
			$w_backtotop  		= $row["backtotop"];

		}
	}
	
	//**MAINMENU**//
	
	$L_['home']				="".$w_home."";
	$L_['signup']			="".$w_signup."";
	$L_['track_my_parcel']	="".$w_track_my_parcel."";
	$L_['company']			="".$w_company."";
	$L_['faq']				="".$w_faq."";
	$L_['contacs']			="".$w_contacs."";
	$L_['login']			="".$w_login."";

	//**MENU FOOTER**//

	$L_['terms']		="".$w_terms."";
	$L_['privacy']		="".$w_privacy."";
	$L_['backtotop']	="".$w_backtotop."";
	
	
	//**sql database details index**//
	
	$query = $con->query("SELECT * FROM w_home ORDER BY id DESC");
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){
			
			$A_title  		= $row["title"];
			$A_welcome  	= $row["welcome"];
			$A_logistics  	= $row["logistics"];
			$A_trackn  		= $row["trackn"];
			$A_btrack  		= $row["btrack"];
			$A_shippingc  	= $row["shippingc"];
			$A_calculator  	= $row["calculator"];
			$A_justpop  	= $row["justpop"];
			$A_why  		= $row["why"];
			$A_whys  		= $row["whys"];
			$A_whydetail  	= $row["whydetail"];			
			$A_box1  		= $row["box1"];
			$A_box2  		= $row["box2"];
			$A_box3  		= $row["box3"];
			$A_boxd1  		= $row["boxd1"];
			$A_boxd2  		= $row["boxd2"];
			$A_boxd3  		= $row["boxd3"];			
			$A_section1  	= $row["section1"];
			$A_section2  	= $row["section2"];
			$A_section3  	= $row["section3"];
			$A_post1  		= $row["post1"];
			$A_post2  		= $row["post2"];
			$A_post3  		= $row["post3"];
			$A_post4  		= $row["post4"];
			$A_post5  		= $row["post5"];
			$A_post6  		= $row["post6"];
			$A_post7  		= $row["post7"];
			$A_post8  		= $row["post8"];
			$A_post9  		= $row["post9"];
			$A_post10  		= $row["post10"];
			$A_post11  		= $row["post11"];
			$A_post12  		= $row["post12"];
			$A_more  		= $row["more"];

		}
	}
	
	//**DETAILS INDEX**//
	
	$L_['title']		="".$A_title."";
	$L_['welcome']		="".$A_welcome."";
	$L_['logistics']	="".$A_logistics."";
	$L_['trackn']		="".$A_trackn."";
	$L_['btrack']		="".$A_btrack."";
	$L_['shippingc']	="".$A_shippingc."";
	$L_['calculator']	="".$A_calculator."";
	$L_['justpop']		="".$A_justpop."";
	$L_['why']			="".$A_why."";
	$L_['whys']			="".$A_whys."";
	$L_['whydetail']	="".$A_whydetail."";	
	$L_['box1']			="".$A_box1."";
	$L_['box2']			="".$A_box2."";
	$L_['box3']			="".$A_box3."";
	$L_['boxd1']		="".$A_boxd1."";
	$L_['boxd2']		="".$A_boxd2."";
	$L_['boxd3']		="".$A_boxd3."";
	$L_['section1']		="".$A_section1."";
	$L_['section2']		="".$A_section2."";
	$L_['section3']		="".$A_section3."";
	$L_['post1']		="".$A_post1."";
	$L_['post2']		="".$A_post2."";
	$L_['post3']		="".$A_post3."";
	$L_['post4']		="".$A_post4."";
	$L_['post5']		="".$A_post5."";
	$L_['post6']		="".$A_post6."";
	$L_['post7']		="".$A_post7."";
	$L_['post8']		="".$A_post8."";
	$L_['post9']		="".$A_post9."";
	$L_['post10']		="".$A_post10."";
	$L_['post11']		="".$A_post11."";
	$L_['post12']		="".$A_post12."";
	$L_['more']			="".$A_more."";
	
	
	
	//**sql database details track my parcel**//
	
	$query = $con->query("SELECT * FROM w_track_parcel ORDER BY id DESC");
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){
			
			$T_title  		= $row["t_title"];
			$T_welcome  	= $row["t_welcome"];
			$T_detect  		= $row["t_detect"];
			$T_trackn  		= $row["t_trackn"];
			$T_btrack  		= $row["t_btrack"];
			$T_section1  	= $row["t_section1"];
			$T_section2  	= $row["t_section2"];
			$T_section3  	= $row["t_section3"];
			$T_section4  	= $row["t_section4"];			
			$T_box1  		= $row["t_box1"];
			$T_box2  		= $row["t_box2"];
			$T_box3  		= $row["t_box3"];
			$T_boxd1  		= $row["t_boxd1"];
			$T_boxd2  		= $row["t_boxd2"];
			$T_boxd3  		= $row["t_boxd3"];			
			$T_more  		= $row["t_more"];

		}
	}
	
	//**DETAILS TRACK MY PARCEL**//
	
	$L_['t_title']			="".$T_title."";
	$L_['t_welcome']		="".$T_welcome."";
	$L_['t_detect']			="".$T_detect."";
	$L_['t_trackn']			="".$T_trackn."";
	$L_['t_btrack']			="".$T_btrack."";
	$L_['t_section1']		="".$T_section1."";
	$L_['t_section2']		="".$T_section2."";
	$L_['t_section3']		="".$T_section3."";
	$L_['t_section4']		="".$T_section4."";	
	$L_['t_box1']			="".$T_box1."";
	$L_['t_box2']			="".$T_box2."";
	$L_['t_box3']			="".$T_box3."";
	$L_['t_boxd1']			="".$T_boxd1."";
	$L_['t_boxd2']			="".$T_boxd2."";
	$L_['t_boxd3']			="".$T_boxd3."";
	$L_['t_more']			="".$T_more."";
	
	
	//**sql database details about us**//
	
	$query = $con->query("SELECT * FROM w_about ORDER BY id DESC");
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){
			
			$C_title  		= $row["c_title"];
			$C_about  	    = $row["c_about"];			
			$C_section1  	= $row["c_section1"];
			$C_section2  	= $row["c_section2"];
			$C_section3  	= $row["c_section3"];
			$C_section4  	= $row["c_section4"];			
			$C_box1  		= $row["c_box1"];
			$C_box2  		= $row["c_box2"];
			$C_box3  		= $row["c_box3"];
			$C_boxd1  		= $row["c_boxd1"];
			$C_boxd2  		= $row["c_boxd2"];
			$C_boxd3  		= $row["c_boxd3"];			
			$C_info_title1 	= $row['c_info_title1'];
			$C_info_title2 	= $row['c_info_title2'];
			$C_info_detail 	= $row['c_info_detail'];

		}
	}
	
	//**DETAILS ABOUT US**//
	
	$L_['c_title']			="".$C_title."";
	$L_['c_about']			="".$C_about."";	
	$L_['c_section1']		="".$C_section1."";
	$L_['c_section2']		="".$C_section2."";
	$L_['c_section3']		="".$C_section3."";
	$L_['c_section4']		="".$C_section4."";	
	$L_['c_box1']			="".$C_box1."";
	$L_['c_box2']			="".$C_box2."";
	$L_['c_box3']			="".$C_box3."";
	$L_['c_boxd1']			="".$C_boxd1."";
	$L_['c_boxd2']			="".$C_boxd2."";
	$L_['c_boxd3']			="".$C_boxd3."";
	$L_['c_info_title1']	="".$C_info_title1."";
	$L_['c_info_title2']	="".$C_info_title1."";
	$L_['c_info_detail']	="".$C_info_detail."";
	
	
	//**sql database details Frequently Asked Questions**//
	
	$query = $con->query("SELECT * FROM w_faqs ORDER BY id DESC");
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){
			
			$F_title  		= $row["f_title"];
			$F_faqs  	    = $row["f_faqs"];			
			$F_faqs1  		= $row["f_faqs1"];
			$F_faqs2  		= $row["f_faqs2"];
			$F_faqs3  		= $row["f_faqs3"];
			$F_faqs4  		= $row["f_faqs4"];
			$F_faqs5  		= $row["f_faqs5"];
			$F_faqs6  		= $row["f_faqs6"];
			$F_faqs7  		= $row["f_faqs7"];
			$F_faqs8  		= $row["f_faqs8"];
			$F_faqs9  		= $row["f_faqs9"];
			$F_faqs10  		= $row["f_faqs10"];
			$F_faqs11  		= $row["f_faqs11"];
			$F_faqs12  		= $row["f_faqs12"];
			$F_faqs13  		= $row["f_faqs13"];
			$F_faqs14  		= $row["f_faqs14"];
			$F_faqs15  		= $row["f_faqs15"];
			$F_faqs16  		= $row["f_faqs16"];
			$F_faqs17  		= $row["f_faqs17"];
			$F_faqs18  		= $row["f_faqs18"];
			

		}
	}
	
	//**DETAILS FREQUENTLY ASKED QUESTIONS**//
	
	$L_['f_title']			="".$F_title."";
	$L_['f_faqs']			="".$F_faqs."";	
	$L_['f_faqs1']			="".$F_faqs1."";
	$L_['f_faqs2']			="".$F_faqs2."";
	$L_['f_faqs3']			="".$F_faqs3."";
	$L_['f_faqs4']			="".$F_faqs4."";
	$L_['f_faqs5']			="".$F_faqs5."";
	$L_['f_faqs6']			="".$F_faqs6."";
	$L_['f_faqs7']			="".$F_faqs7."";
	$L_['f_faqs8']			="".$F_faqs8."";
	$L_['f_faqs9']			="".$F_faqs9."";
	$L_['f_faqs10']			="".$F_faqs10."";
	$L_['f_faqs11']			="".$F_faqs11."";
	$L_['f_faqs12']			="".$F_faqs12."";
	$L_['f_faqs13']			="".$F_faqs13."";
	$L_['f_faqs14']			="".$F_faqs14."";
	$L_['f_faqs15']			="".$F_faqs15."";
	$L_['f_faqs16']			="".$F_faqs16."";
	$L_['f_faqs17']			="".$F_faqs17."";
	$L_['f_faqs18']			="".$F_faqs18."";
	
	
	//**sql database details Contact us**//
	
	$query = $con->query("SELECT * FROM w_contact ORDER BY id DESC");
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){
			
			$id					= $row['id'];	
			$G_title 			= $row['g_title'];
			$G_get 				= $row['g_get'];
			$G_get1 			= $row['g_get1'];
			$G_name		 		= $row['g_name'];
			$G_email	 		= $row['g_email'];
			$G_subject 			= $row['g_subject'];
			$G_message 			= $row['g_message'];
			$G_send 			= $row['g_send'];
			$G_phone 			= $row['g_phone'];
			$G_address 			= $row['g_address'];
			$G_emails 			= $row['g_emails'];
			$G_info_phone 		= $row['g_info_phone'];
			$G_info_address 	= $row['g_info_address'];
			$G_info_emails 		= $row['g_info_emails'];
			$G_lat 				= $row['g_lat'];
			$G_lng		 		= $row['g_lng'];
			

		}
	}
	
	//**DETAILS CONTACT US**//
	
	$L_['g_title']			="".$G_title."";
	$L_['g_get']			="".$G_get."";	
	$L_['g_get1']			="".$G_get1."";
	$L_['g_name']			="".$G_name."";
	$L_['g_email']			="".$G_email."";
	$L_['g_subject']		="".$G_subject."";
	$L_['g_message']		="".$G_message."";
	$L_['g_send']			="".$G_send."";
	$L_['g_phone']			="".$G_phone."";
	$L_['g_address']		="".$G_address."";
	$L_['g_emails']			="".$G_emails."";
	$L_['g_info_phone']		="".$G_info_phone."";
	$L_['g_info_address']	="".$G_info_address."";
	$L_['g_info_emails']	="".$G_info_emails."";
	$L_['g_lat']			="".$G_lat."";
	$L_['g_lng']			="".$G_lng."";
	
	
	//**sql database Privacy policies**//
	
	$query = $con->query("SELECT * FROM w_privacy ORDER BY id DESC");
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){
			
			$id					= $row['id'];	
			$TT_title 			= $row['p_title'];
			$TT_mainprivacy 	= $row['p_mainprivacy'];
			$TT_privacy 		= $row['p_privacy'];
			$TT_content1		= $row['p_content1'];
			$TT_licontent1	 	= $row['p_licontent1'];
			$TT_licontent2 		= $row['p_licontent2'];
			$TT_licontent3 		= $row['p_licontent3'];
			$TT_content2 		= $row['p_content2'];
			$TT_content3 		= $row['p_content3'];
			$TT_content4 		= $row['p_content4'];
			

		}
	}
	
	//**DETAILS PRIVACY POLICIES**//
	
	$L_['p_title']			="".$TT_title."";
	$L_['p_mainprivacy']	="".$TT_mainprivacy."";	
	$L_['p_privacy']		="".$TT_privacy."";
	$L_['p_content1']		="".$TT_content1."";
	$L_['p_licontent1']		="".$TT_licontent1."";
	$L_['p_licontent2']		="".$TT_licontent2."";
	$L_['p_licontent3']		="".$TT_licontent3."";
	$L_['p_content2']		="".$TT_content2."";
	$L_['p_content3']		="".$TT_content3."";
	$L_['p_content4']		="".$TT_content4."";
	
	
	//**sql database Terms and Conditions**//
	
	$query = $con->query("SELECT * FROM w_terms ORDER BY id DESC");
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){
			
			$id					= $row['id'];	
			$TT_title 			= $row['t_title'];
			$TT_mainprivacy 	= $row['t_mainprivacy'];
			$TT_privacy 		= $row['t_privacy'];
			$TT_content1		= $row['t_content1'];
			$TT_licontent1	 	= $row['t_licontent1'];
			$TT_licontent2 		= $row['t_licontent2'];
			$TT_licontent3 		= $row['t_licontent3'];
			$TT_content2 		= $row['t_content2'];
			$TT_content3 		= $row['t_content3'];
			$TT_content4 		= $row['t_content4'];
			

		}
	}
	
	//**DETAILS TERMS AND CONDITIONS**//
	
	$L_['t_title']			="".$TT_title."";
	$L_['t_mainprivacy']	="".$TT_mainprivacy."";	
	$L_['t_privacy']		="".$TT_privacy."";
	$L_['t_content1']		="".$TT_content1."";
	$L_['t_licontent1']		="".$TT_licontent1."";
	$L_['t_licontent2']		="".$TT_licontent2."";
	$L_['t_licontent3']		="".$TT_licontent3."";
	$L_['t_content2']		="".$TT_content2."";
	$L_['t_content3']		="".$TT_content3."";
	$L_['t_content4']		="".$TT_content4."";
	
	
	//**sql database Shipping Calculator**//
	
	$query = $con->query("SELECT * FROM w_ship_calculator ORDER BY id DESC");
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){
			
			$id					= $row['id'];	
			$SH_title_country 	= $row['h_title_country'];
			$SH_title_state 	= $row['h_title_state'];
			$SH_title_city 		= $row['h_title_city'];
			$SH_length 			= $row['h_length'];
			$SH_width			= $row['h_width'];
			$SH_heigth	 		= $row['h_heigth'];
			$SH_weigth 			= $row['h_weigth'];
			$SH_submit	 		= $row['h_submit'];
			

		}
	}
	
	//**DETAILS SHIPPING CALCULATOR**//
	
	$L_['h_title_country']	="".$SH_title_country."";
	$L_['h_title_state']	="".$SH_title_state."";
	$L_['h_title_city']		="".$SH_title_city."";	
	$L_['h_length']			="".$SH_length."";
	$L_['h_width']			="".$SH_width."";
	$L_['h_heigth']			="".$SH_heigth."";
	$L_['h_weigth']			="".$SH_weigth."";
	$L_['h_submit']			="".$SH_submit."";
	
	
	
	//**sql database Search Result**//
	
	$query = $con->query("SELECT * FROM w_search_result ORDER BY id DESC");
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){
			
			$id					= $row['id'];	
			$SR_title 			= $row['sr_title'];
			$SR_home_title 		= $row['sr_home_title'];
			$SR_main_title 		= $row['sr_main_title'];
			$SR_courier			= $row['sr_courier'];
			$SR_services	 	= $row['sr_services'];
			$SR_time 			= $row['sr_time'];
			$SR_weight	 		= $row['sr_weight'];
			$SR_rates 			= $row['sr_rates'];
			$SR_book 			= $row['sr_book'];
			$SR_bookn 			= $row['sr_bookn'];
			$SR_from			= $row['sr_from'];
			$SR_to	 			= $row['sr_to'];
			$SR_width 			= $row['sr_width'];
			$SR_length	 		= $row['sr_length'];
			$SR_height 			= $row['sr_height'];
			$SR_volumetric	 	= $row['sr_volumetric'];
			

		}
	}
	
	//**DETAILS SEARCH RESULT**//
	
	$L_['sr_title']				="".$SR_title."";
	$L_['sr_home_title']		="".$SR_home_title."";	
	$L_['sr_main_title']		="".$SR_main_title."";
	$L_['sr_courier']			="".$SR_courier."";
	$L_['sr_services']			="".$SR_services."";
	$L_['sr_time']				="".$SR_time."";
	$L_['sr_weight']			="".$SR_weight."";
	$L_['sr_rates']				="".$SR_rates."";
	$L_['sr_book']				="".$SR_book."";	
	$L_['sr_bookn']				="".$SR_bookn."";
	$L_['sr_from']				="".$SR_from."";
	$L_['sr_to']				="".$SR_to."";
	$L_['sr_width']				="".$SR_width."";
	$L_['sr_length']			="".$SR_length."";
	$L_['sr_height']			="".$SR_height."";
	$L_['sr_volumetric']		="".$SR_volumetric."";
	
	
	
	//**sql database Booking Form**//
	
	$query = $con->query("SELECT * FROM w_booking ORDER BY id DESC");
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){
			
			$id					= $row['id'];	
			$BF_title 			= $row['bf_title'];
			$BF_main_title1 	= $row['bf_main_title1'];
			$BF_main_title2 	= $row['bf_main_title2'];
			$BF_email			= $row['bf_email'];
			$BF_emailn	 		= $row['bf_emailn'];
			$BF_password 		= $row['bf_password'];
			$BF_name	 		= $row['bf_name'];
			$BF_firtname 		= $row['bf_firtname'];
			$BF_phone 			= $row['bf_phone'];
			$BF_cname 			= $row['bf_cname'];
			$BF_nbusiness		= $row['bf_nbusiness'];
			$BF_address	 		= $row['bf_address'];
			$BF_rcountry 		= $row['bf_rcountry'];
			$BF_zcode	 		= $row['bf_zcode'];
			$BF_cdate 			= $row['bf_cdate'];
			$BF_daddress	 	= $row['bf_daddress'];
			$BF_ncustomer 		= $row['bf_ncustomer'];
			$BF_fncustomer 		= $row['bf_fncustomer'];
			$BF_ecustomer 		= $row['bf_ecustomer'];
			$BF_cemail			= $row['bf_cemail'];
			$BF_cphone	 		= $row['bf_cphone'];
			$BF_coname 			= $row['bf_coname'];
			$BF_comname	 		= $row['bf_comname'];
			$BF_comaddress 		= $row['bf_comaddress'];
			$BF_dnote 			= $row['bf_dnote'];
			$BF_climit 			= $row['bf_climit'];
			$BF_pdetail			= $row['bf_pdetail'];
			$BF_hbig	 		= $row['bf_hbig'];
			$BF_hheavy 			= $row['bf_hheavy'];
			$BF_corigin	 		= $row['bf_corigin'];
			$BF_cdesti 			= $row['bf_cdesti'];
			$BF_services	 	= $row['bf_services'];			
			$BF_pvalue 			= $row['bf_pvalue'];
			$BF_tcondi1	 		= $row['bf_tcondi1'];
			$BF_tcondi2 		= $row['bf_tcondi2'];
			$BF_symbol	 		= $row['bf_symbol'];
			$BF_register	 	= $row['bf_register'];
			

		}
	}
	
	//**DETAILS BOOKING FORM**//
	
	$L_['bf_title']				="".$BF_title."";
	$L_['bf_main_title1']		="".$BF_main_title1."";	
	$L_['bf_main_title2']		="".$BF_main_title2."";
	$L_['bf_email']				="".$BF_email."";
	$L_['bf_emailn']			="".$BF_emailn."";
	$L_['bf_password']			="".$BF_password."";
	$L_['bf_name']				="".$BF_name."";
	$L_['bf_firtname']			="".$BF_firtname."";
	$L_['bf_phone']				="".$BF_phone."";	
	$L_['bf_cname']				="".$BF_cname."";
	$L_['bf_nbusiness']			="".$BF_nbusiness."";
	$L_['bf_address']			="".$BF_address."";
	$L_['bf_rcountry']			="".$BF_rcountry."";
	$L_['bf_zcode']				="".$BF_zcode."";
	$L_['bf_cdate']				="".$BF_cdate."";
	$L_['bf_daddress']			="".$BF_daddress."";
	$L_['bf_ncustomer']			="".$BF_ncustomer."";	
	$L_['bf_fncustomer']		="".$BF_fncustomer."";
	$L_['bf_ecustomer']			="".$BF_ecustomer."";
	$L_['bf_cemail']			="".$BF_cemail."";
	$L_['bf_cphone']			="".$BF_cphone."";
	$L_['bf_coname']			="".$BF_coname."";
	$L_['bf_comname']			="".$BF_comname."";
	$L_['bf_comaddress']		="".$BF_comaddress."";	
	$L_['bf_dnote']				="".$BF_dnote."";
	$L_['bf_climit']			="".$BF_climit."";
	$L_['bf_pdetail']			="".$BF_pdetail."";
	$L_['bf_hbig']				="".$BF_hbig."";
	$L_['bf_hheavy']			="".$BF_hheavy."";
	$L_['bf_corigin']			="".$BF_corigin."";
	$L_['bf_cdesti']			="".$BF_cdesti."";	
	$L_['bf_services']			="".$BF_services."";
	$L_['bf_pvalue']			="".$BF_pvalue."";
	$L_['bf_tcondi1']			="".$BF_tcondi1."";
	$L_['bf_tcondi2']			="".$BF_tcondi2."";
	$L_['bf_symbol']			="".$BF_symbol."";
	$L_['bf_register']			="".$BF_register."";
	
	
	//**sql database Booking Fotm # 2**//
	
	$query = $con->query("SELECT * FROM w_bookingtwo ORDER BY id DESC");
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){
			
			$id					= $row['id'];	
			$SL_service 		= $row['sl_service'];
			$SL_pweight 		= $row['sl_pweight'];
			$SL_sinfo 			= $row['sl_sinfo'];
			$SL_service1		= $row['sl_service1'];
			$SL_service2	 	= $row['sl_service2'];
			$SL_service3 		= $row['sl_service3'];
			$SL_service4	 	= $row['sl_service4'];
			$SL_service5 		= $row['sl_service5'];
			$SL_service6 		= $row['sl_service6'];
			$SL_rate 			= $row['sl_rate'];
			$SL_currency		= $row['sl_currency'];
			$SL_total	 		= $row['sl_total'];
			

		}
	}
	
	//**DETAILS BOOKING FORM # 2**//
	
	$L_['sl_service']			="".$SL_service."";
	$L_['sl_pweight']			="".$SL_pweight."";	
	$L_['sl_sinfo']				="".$SL_sinfo."";
	$L_['sl_service1']			="".$SL_service1."";
	$L_['sl_service2']			="".$SL_service2."";
	$L_['sl_service3']			="".$SL_service3."";
	$L_['sl_service4']			="".$SL_service4."";
	$L_['sl_service5']			="".$SL_service5."";
	$L_['sl_service6']			="".$SL_service6."";	
	$L_['sl_rate']				="".$SL_rate."";
	$L_['sl_currency']			="".$SL_currency."";
	$L_['sl_total']				="".$SL_total."";
	
	
	//**sql database Signup Form**//
	
	$query = $con->query("SELECT * FROM w_signup ORDER BY id DESC");
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){
			
			$id					= $row['id'];	
			$SG_title 			= $row['sg_title'];
			$SG_signup 			= $row['sg_signup'];
			$SG_name 			= $row['sg_name'];
			$SG_lastname		= $row['sg_lastname'];
			$SG_id	 			= $row['sg_id'];
			$SG_email 			= $row['sg_email'];
			$SG_business	 	= $row['sg_business'];
			$SG_phone1 			= $row['sg_phone1'];
			$SG_phone2 			= $row['sg_phone2'];
			$SG_address			= $row['sg_address'];
			$SG_postal			= $row['sg_postal'];
			$SG_password	 	= $row['sg_password'];			
			$SG_cpass	 		= $row['sg_cpass'];
			$SG_agree 			= $row['sg_agree'];
			$SG_term1	 		= $row['sg_term1'];
			$SG_term2 			= $row['sg_term2'];
			$SG_term3 			= $row['sg_term3'];
			$SG_already			= $row['sg_already'];
			$SG_login			= $row['sg_login'];
			$SG_register	 	= $row['sg_register'];
			$SG_ohstep	 		= $row['sg_ohstep'];
			

		}
	}
	
	//**DETAILS SIGNUP FORM**//
	
	$L_['sg_title']				="".$SG_title."";
	$L_['sg_signup']			="".$SG_signup."";	
	$L_['sg_name']				="".$SG_name."";
	$L_['sg_lastname']			="".$SG_lastname."";
	$L_['sg_id']				="".$SG_id."";
	$L_['sg_email']				="".$SG_email."";
	$L_['sg_business']			="".$SG_business."";
	$L_['sg_phone1']			="".$SG_phone1."";
	$L_['sg_phone2']			="".$SG_phone2."";	
	$L_['sg_address']			="".$SG_address."";
	$L_['sg_postal']			="".$SG_postal."";
	$L_['sg_password']			="".$SG_password."";	
	$L_['sg_cpass']				="".$SG_cpass."";
	$L_['sg_agree']				="".$SG_agree."";
	$L_['sg_term1']				="".$SG_term1."";
	$L_['sg_term2']				="".$SG_term2."";
	$L_['sg_term3']				="".$SG_term3."";	
	$L_['sg_already']			="".$SG_already."";
	$L_['sg_login']				="".$SG_login."";
	$L_['sg_register']			="".$SG_register."";
	$L_['sg_ohstep']			="".$SG_ohstep."";
	
	
	//**sql database Login Form**//
	
	$query = $con->query("SELECT * FROM w_login ORDER BY id DESC");
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){
			
			$id					= $row['id'];	
			$LGN_title 			= $row['lgn_title'];
			$LGN_signup 		= $row['lgn_signup'];
			$LGN_username 		= $row['lgn_username'];
			$LGN_password		= $row['lgn_password'];
			$LGN_remember	 	= $row['lgn_remember'];
			$LGN_nregister 		= $row['lgn_nregister'];
			$LGN_sup	 		= $row['lgn_sup'];
			$LGN_forgot	 		= $row['lgn_forgot'];
			$LGN_sup2	 		= $row['lgn_sup2'];
			

		}
	}
	
	//**DETAILS LOGIN FORM**//
	
	$L_['lgn_title']			="".$LGN_title."";
	$L_['lgn_signup']			="".$LGN_signup."";	
	$L_['lgn_username']			="".$LGN_username."";
	$L_['lgn_password']			="".$LGN_password."";
	$L_['lgn_remember']			="".$LGN_remember."";
	$L_['lgn_nregister']		="".$LGN_nregister."";
	$L_['lgn_sup']				="".$LGN_sup."";
	$L_['lgn_forgot']			="".$LGN_forgot."";
	$L_['lgn_sup2']				="".$LGN_sup2."";
	
	
	//**sql database Recover Password Form**//
	
	$query = $con->query("SELECT * FROM w_recoverpass ORDER BY id DESC");
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){
			
			$id					= $row['id'];	
			$FT_title 			= $row['ft_title'];
			$FT_fmail 			= $row['ft_fmail'];
			$FT_youremail 		= $row['ft_youremail'];
			$FT_sin				= $row['ft_sin'];
			$FT_or	 			= $row['ft_or'];
			$FT_siup 			= $row['ft_siup'];
			$FT_rpass	 		= $row['ft_rpass'];
			$FT_ohw	 			= $row['ft_ohw'];
			$FT_ohnot			= $row['ft_ohnot'];
			$FT_congra	 		= $row['ft_congra'];
			$FT_sucess	 		= $row['ft_sucess'];
			

		}
	}
	
	//**DETAILS RECOVER PASWORD FORM**//
	
	$L_['ft_title']				="".$FT_title."";
	$L_['ft_fmail']				="".$FT_fmail."";	
	$L_['ft_youremail']			="".$FT_youremail."";
	$L_['ft_sin']				="".$FT_sin."";
	$L_['ft_or']				="".$FT_or."";
	$L_['ft_siup']				="".$FT_siup."";
	$L_['ft_rpass']				="".$FT_rpass."";
	$L_['ft_ohw']				="".$FT_ohw."";
	$L_['ft_ohnot']				="".$FT_ohnot."";
	$L_['ft_congra']			="".$FT_congra."";
	$L_['ft_sucess']			="".$FT_sucess."";
	
	
		//**sql database Tracking Result Form**//
	
	$query = $con->query("SELECT * FROM w_trackresult ORDER BY id DESC");
	if($query->num_rows > 0){ 
		while($row = $query->fetch_assoc()){
			
			$id						= $row['id'];	
			$TRA_parcel0			= $row['tra_parcel0'];
			$TRA_parcel1			= $row['tra_parcel1'];
			$TRA_parcel2			= $row['tra_parcel2'];
			$TRA_parcel3			= $row['tra_parcel3'];	
			$TRA_parcel4			= $row['tra_parcel4'];
			$TRA_parcel5			= $row['tra_parcel5'];
			$TRA_parcel6			= $row['tra_parcel6'];
			$TRA_parcel7			= $row['tra_parcel7'];
			$TRA_parcel8			= $row['tra_parcel8'];
			$TRA_parcel9			= $row['tra_parcel9'];
			$TRA_parcel10 			= $row['tra_parcel10'];
			$TRA_parcel11			= $row['tra_parcel11'];	
			$TRA_parcel12			= $row['tra_parcel12'];
			$TRA_parcel13			= $row['tra_parcel13'];
			$TRA_parcel14			= $row['tra_parcel14'];
			$TRA_parcel15			= $row['tra_parcel15'];
			$TRA_parcel16			= $row['tra_parcel16'];	
			$TRA_parcel17			= $row['tra_parcel17'];
			$TRA_parcel18			= $row['tra_parcel18'];
			$TRA_parcel19			= $row['tra_parcel19'];
			$TRA_parcel20			= $row['tra_parcel20'];	
			$TRA_parcel21			= $row['tra_parcel21'];
			$TRA_parcel22			= $row['tra_parcel22'];	
			$TRA_parcel23			= $row['tra_parcel23'];
			$TRA_parcel24			= $row['tra_parcel24'];
			$TRA_parcel25			= $row['tra_parcel25'];
			$TRA_parcel26			= $row['tra_parcel26'];
			$TRA_parcel27			= $row['tra_parcel27'];
			$TRA_parcel28			= $row['tra_parcel28'];
			$TRA_parcel29			= $row['tra_parcel29'];
			$TRA_parcel30			= $row['tra_parcel30'];
			$TRA_parcel31			= $row['tra_parcel31'];
			

		}
	}
	
	//**DETAILS TRACKING RESULT FORM**//
	
	$L_['tra_parcel0']				="".$TRA_parcel0."";
	$L_['tra_parcel1']				="".$TRA_parcel1."";	
	$L_['tra_parcel2']				="".$TRA_parcel2."";
	$L_['tra_parcel3']				="".$TRA_parcel3."";
	$L_['tra_parcel4']				="".$TRA_parcel4."";
	$L_['tra_parcel5']				="".$TRA_parcel5."";
	$L_['tra_parcel6']				="".$TRA_parcel6."";
	$L_['tra_parcel7']				="".$TRA_parcel7."";
	$L_['tra_parcel8']				="".$TRA_parcel8."";	
	$L_['tra_parcel9']				="".$TRA_parcel9."";
	$L_['tra_parcel10']				="".$TRA_parcel10."";
	$L_['tra_parcel11']				="".$TRA_parcel11."";	
	$L_['tra_parcel12']				="".$TRA_parcel12."";
	$L_['tra_parcel13']				="".$TRA_parcel13."";
	$L_['tra_parcel14']				="".$TRA_parcel14."";
	$L_['tra_parcel15']				="".$TRA_parcel15."";
	$L_['tra_parcel16']				="".$TRA_parcel16."";	
	$L_['tra_parcel17']				="".$TRA_parcel17."";
	$L_['tra_parcel18']				="".$TRA_parcel18."";
	$L_['tra_parcel19']				="".$TRA_parcel19."";
	$L_['tra_parcel20']				="".$TRA_parcel20."";	
	$L_['tra_parcel21']				="".$TRA_parcel21."";
	$L_['tra_parcel22']				="".$TRA_parcel22."";	
	$L_['tra_parcel23']				="".$TRA_parcel23."";
	$L_['tra_parcel24']				="".$TRA_parcel24."";
	$L_['tra_parcel25']				="".$TRA_parcel25."";
	$L_['tra_parcel26']				="".$TRA_parcel26."";
	$L_['tra_parcel27']				="".$TRA_parcel27."";	
	$L_['tra_parcel28']				="".$TRA_parcel28."";
	$L_['tra_parcel29']				="".$TRA_parcel29."";
	$L_['tra_parcel30']				="".$TRA_parcel30."";
	$L_['tra_parcel31']				="".$TRA_parcel31."";
	


?>