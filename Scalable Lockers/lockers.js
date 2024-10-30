//hard coded locker data
//Full locker info (locker number, locker color, Student Name) should be inputed from database to test_lockers array

var test_lockers = [
	["1", "Green", "Tony You"],
	["2", "Red", "James Marty"],
	["3", "Green", "Arty Sun"],
	["4", "Black", ""],
	["5", "Green", "Mike Lee"],
	["6", "Gray", "Sara Oak"],
	["7", "Red", "Tom Nacal"],
	["8", "Red", "George Smith"],
	["9", "Green", "Kelvin Opeal"],
	
	["10", "Red", "Tony You"],//2nd grp
	["11", "Green", "James Marty"],
	["12", "Green", "Arty Sun"],
	["13", "Black", ""],
	["14", "Green", "Mike Lee"],
	["15", "Red", "Sara Oak"],
	["16", "Green", "Tom Nacal"],
	["17", "Green", "George Smith"],
	["18", "Green", "Kelvin Opeal"], 

	["19", "Red", "Tony You"],	//3rd grp
	["20", "Red", "James Marty"],
	["21", "Red", "Arty Sun"],
	["23", "Black", ""],
	["24", "Red", "Mike Lee"],
	["25", "Red", "Sara Oak"],
	["26", "Green", "Tom Nacal"],
	["27", "Gray", "George Smith"],
	["28", "Red", "Kelvin Opeal"]
	
];


var num_of_lockers;
var locker_set = 1;
var click_stat = new Array(27).fill(0);
var locker_info = []; //each locker database info
var locker_num = []; //button number
var locker_stat = []; //button color
var locker_name = []; //button name

//assigning locker data to each specific array
function locker_data(test_lockers) {
	var col = test_lockers.length //num of lockers
	var row = test_lockers[0].length	//num of elements in each locker
	
	for (var i = 0; i < col; i++) {
		for (var j = 0; j < row; j++) {
			//Locker infos are assigned to locker info array
			locker_info.push(test_lockers[i][j]);
		}
	}
	
	//locker number is filtered from locker_info array and assigned to locker_num array
	for (var l_num = 0; l_num < locker_info.length; l_num += 3) {
		locker_num.push("Locker ".concat(locker_info[l_num]).toString());
	}

	//locker color is filtered from locker_info array and assigned to locker_stat array	
	for (var l_stat = 1; l_stat < locker_info.length; l_stat += 3) {
		locker_stat.push(locker_info[l_stat]);
	}
	
	//locker name is filtered from locker_info array and assigned to locker_name array
	for (var l_name = 2; l_name < locker_info.length; l_name += 3) {
		locker_name.push(locker_info[l_name]);
	}

	//assign number of lockers 
	num_of_lockers = locker_num.length;
}

//assign locker door colors based on locker_stat info
function locker_color() {
	var count = 1;
	for (var i = 0; i < num_of_lockers; i++) {
		var locker = "Locker_btn";
		locker = locker.concat(count);
		if (locker_stat[i] == "Green") {
			document.getElementById(locker).style.background = '#5cb85c';
		} 
		else if (locker_stat[i] == "Red") {
			document.getElementById(locker).style.background = '#d9534f';
		} 
		else if (locker_stat[i] == "Gray") {
			//if grey then button is disabled
			document.getElementById(locker).style.background = 'Grey';
			document.getElementById(locker).disabled = true;
		}
		else{
			document.getElementById(locker).style.background = 'Silver';
			document.getElementById(locker).disabled = true;
		}
		count += 1;
	}
}

//locker alerts and border highlight function
function button_event(index){
	//Green locker = Inserting books
	
	if (locker_stat[index] == "Green") {
		document.getElementById("msg").innerHTML = "[" + locker_num[index] + "] " + " Insert Books: " + locker_name[index];
	} 
	//Red locker = Removing book
	else if (locker_stat[index] == "Red") {
		document.getElementById("msg").innerHTML = "[" + locker_num[index] + "] " + " Remove Books: " + locker_name[index];
	}
	
	//Button clicked is highlighted by black border
	if (click_stat[index] == 0)
	{
		click_stat[index] = 1;
		document.getElementById("Locker_btn".concat((index+1).toString())).style.border = "2px solid black";
	}
	//if button is clicked again then unhighlight black border
	else
	{
		click_stat[index] = 0;
		document.getElementById("Locker_btn".concat((index+1).toString())).style.border = "none";
	}
	
}


function locker_face_name(){
	for(var i = 0; i < num_of_lockers; i++)
		{
			var index = i + 1;
			var name = locker_name[i].split(" ")
			if(locker_name[i] == "" || locker_name[i] == " ")
				{
					continue;
				}
			else{
				if(name[1] == null)
					{
						document.getElementById("Locker_btn".concat((index).toString())).textContent = locker_num[i] + ": " + "[" + name[0].substr(0,6) + "]";
					}
				else{
						document.getElementById("Locker_btn".concat((index).toString())).textContent = locker_num[i] + ": " + "[" + name[0].substr(0,1) + ". " + name[1].substr(0,3) + "]";
				}
			}
			
		}
	// 
}

function check_locker_stats(){
	
	for(var i = 0; i < num_of_lockers; i++)
		{

			if(click_stat[i] == 1){
				document.getElementById("Locker_btn".concat((i+1).toString())).style.border = "none";
				click_stat[i] = 0;
			}
		}
}

function locker_set_page(){
	
	document.getElementById("first_pg").addEventListener("click", function(){
		document.getElementsByClassName("btn-group1")[0].style.display = "inline-block";
		document.getElementsByClassName("btn-group2")[0].style.display = "none";
		document.getElementsByClassName("btn-group3")[0].style.display = "none";
		
		document.getElementById("first_pg").style.borderColor = "black";
		document.getElementById("sec_pg").style.borderColor = "transparent";
		document.getElementById("third_pg").style.borderColor = "transparent";
		
		check_locker_stats();
		
	});
	
	document.getElementById("sec_pg").addEventListener("click", function(){
		document.getElementsByClassName("btn-group1")[0].style.display = "none";
		document.getElementsByClassName("btn-group2")[0].style.display = "inline-block";
		document.getElementsByClassName("btn-group3")[0].style.display = "none";
		
		document.getElementById("first_pg").style.borderColor = "transparent";
		document.getElementById("sec_pg").style.borderColor = "black";
		document.getElementById("third_pg").style.borderColor = "transparent";
		
		check_locker_stats();
		
	});
	
	document.getElementById("third_pg").addEventListener("click", function(){
		document.getElementsByClassName("btn-group1")[0].style.display = "none";
		document.getElementsByClassName("btn-group2")[0].style.display = "none";
		document.getElementsByClassName("btn-group3")[0].style.display = "inline-block";
		
				
		document.getElementById("first_pg").style.borderColor = "transparent";
		document.getElementById("sec_pg").style.borderColor = "transparent";
		document.getElementById("third_pg").style.borderColor = "black";
		
		check_locker_stats();

	});
	
	
}

function alerts_set1() {
	
	if(locker_set == 1){
			
			document.getElementById("Locker_btn1").addEventListener("click", function() {
				button_event(0);
			});
			document.getElementById("Locker_btn2").addEventListener("click", function() {
				button_event(1);
			});
			document.getElementById("Locker_btn3").addEventListener("click", function() {
				button_event(2);
			});
			document.getElementById("Locker_btn4").addEventListener("click", function() {
				button_event(3);
			});
			document.getElementById("Locker_btn5").addEventListener("click", function() {
				button_event(4);
			});
			document.getElementById("Locker_btn6").addEventListener("click", function() {
				button_event(5);
			});
			document.getElementById("Locker_btn7").addEventListener("click", function() {
				button_event(6);
			});
			document.getElementById("Locker_btn8").addEventListener("click", function() {
				button_event(7);
			});
			document.getElementById("Locker_btn9").addEventListener("click", function() {
				button_event(8);
			});
		
	}

	
	
	
}

function alerts_set2(){
		document.getElementById("Locker_btn10").addEventListener("click", function() {
			button_event(9);
		});
		document.getElementById("Locker_btn11").addEventListener("click", function() {
			button_event(10);
		});
		document.getElementById("Locker_btn12").addEventListener("click", function() {
			button_event(11);
		});
		document.getElementById("Locker_btn13").addEventListener("click", function() {
			button_event(12);
		});
		document.getElementById("Locker_btn14").addEventListener("click", function() {
			button_event(13);
		});
		document.getElementById("Locker_btn15").addEventListener("click", function() {
			button_event(14);
		});
		document.getElementById("Locker_btn16").addEventListener("click", function() {
			button_event(15);
		});
		document.getElementById("Locker_btn17").addEventListener("click", function() {
			button_event(16);
		});
		document.getElementById("Locker_btn18").addEventListener("click", function() {
			button_event(17);
		});
}

function alerts_set3(){
		document.getElementById("Locker_btn19").addEventListener("click", function() {
			button_event(18);
		});
		document.getElementById("Locker_btn20").addEventListener("click", function() {
			button_event(19);
		});
		document.getElementById("Locker_btn21").addEventListener("click", function() {
			button_event(20);
		});
		document.getElementById("Locker_btn22").addEventListener("click", function() {
			button_event(21);
		});
		document.getElementById("Locker_btn23").addEventListener("click", function() {
			button_event(22);
		});
		document.getElementById("Locker_btn24").addEventListener("click", function() {
			button_event(23);
		});
		document.getElementById("Locker_btn25").addEventListener("click", function() {
			button_event(24);
		});
		document.getElementById("Locker_btn26").addEventListener("click", function() {
			button_event(25);
		});
		document.getElementById("Locker_btn27").addEventListener("click", function() {
			button_event(26);
		});
}
//lockers are updated
//locker updates should be sent to database
function done_submission(click_stat, test_lockers) {
	for (var i = 0; i < num_of_lockers; i++) {
		if (click_stat[i] == 1) 
		{
				document.getElementById("Locker_btn".concat((i+1).toString())).style.border = "none";
				if (test_lockers[i][1] == "Green") 
				{
					test_lockers[i][1] = "Gray";
					click_stat[i] = 2;
				} 
				else if (test_lockers[i][1] == "Red") {
					test_lockers[i][1] = "Gray";
					click_stat[i] = 2;
				} 
				else {
					click_stat[i] = 0;
				}
		
		}
	}
}


locker_data(test_lockers);
locker_color();
locker_face_name();
locker_set_page();
alerts_set1();
alerts_set2();
alerts_set3();

setInterval(function() {
	document.getElementById("done_btn").addEventListener("click", function() {
		document.getElementById("msg").innerHTML = "Submitted";
		done_submission(click_stat, test_lockers);
		locker_info = [];
		locker_num = []; //button number
		locker_stat = []; //button color
		locker_name = []; //button name
		locker_data(test_lockers);
		locker_color();
		
	

	});
	
}, 100);