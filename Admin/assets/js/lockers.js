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
	["9", "Green", "Kelvin Opeal"]
];

var click_stat = [0, 0, 0, 0, 0, 0, 0, 0, 0];
var locker_info = []; //each locker database info
var locker_num = []; //button number
var locker_stat = []; //button color
var locker_name = []; //button name

//assigning locker data to each specific array
function locker_data(test_lockers) {
	for (var i = 0; i < 9; i++) {
		for (var j = 0; j < 3; j++) {
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
}

//assign locker door colors based on locker_stat info
function locker_color() {
	var count = 1;
	
	for (var i = 0; i < locker_stat.length; i++) {
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
	for(var i = 0; i < locker_name.length; i++)
		{
			var index = i + 1;
			var name = locker_name[i].split(" ")
			if(locker_name[i] == "")
				{
					continue;
				}
			else{
				document.getElementById("Locker_btn".concat((index).toString())).textContent = locker_num[i] + ": " + "[" + name[0].substr(0,1) + ". " + name[1].substr(0,3) + "]";
			}
			
		}
	// 
}

function alerts() {

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

//lockers are updated
//locker updates should be sent to database
function done_submission(click_stat, test_lockers) {
	for (var i = 0; i < click_stat.length; i++) {
		if (click_stat[i] == 1) {
			if (test_lockers[i][1] == "Green") {
				test_lockers[i][1] = "Gray";
				click_stat[i] = 0;
			} else if (test_lockers[i][1] == "Red") {
				test_lockers[i][1] = "Gray";
				click_stat[i] = 0;
			} else {
				click_stat[i] = 0;
			}
		
		}
	}
}

locker_data(test_lockers);
locker_color();
locker_face_name();
alerts();
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