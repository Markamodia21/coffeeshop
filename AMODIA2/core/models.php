
<?php  

function insertWebDev($pdo, $Barista_Name, $Barista_Specialty) {

	$sql = "INSERT INTO Barista (Barista_Name, Barista_Specialty) VALUES(?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$Barista_Name, $Barista_Specialty]);

	if ($executeQuery) {
		return true;
	}
}



function updateWebDev($pdo, $Barista_Name, $Barista_Specialty, $Barista_ID) {

	$sql = "UPDATE Barista
				SET Barista_Name = ?,
					Barista_Specialty = ?,
				WHERE Barista_ID = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([ $Barista_Name, $Barista_Specialty, $Barista_ID]);
	
	if ($executeQuery) {
		return true;
	}

}


function deleteWebDev($pdo, Barista_ID) {
	$deleteWebDevProj = "DELETE FROM Coffee_ID WHERE Barista_ID = ?";
	$deleteStmt = $pdo->prepare($deleteWebDevProj);
	$executeDeleteQuery = $deleteStmt->execute([$web_dev_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM web_devs WHERE web_dev_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$web_dev_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}




function getAllWebDevs($pdo) {
	$sql = "SELECT * FROM web_devs";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getWebDevByID($pdo, $web_dev_id) {
	$sql = "SELECT * FROM web_devs WHERE web_dev_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$web_dev_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}





function getProjectsByWebDev($pdo, $web_dev_id) {
	
	$sql = "SELECT 
				projects.project_id AS project_id,
				projects.project_name AS project_name,
				projects.technologies_used AS technologies_used,
				projects.date_added AS date_added,
				CONCAT(web_devs.first_name,' ',web_devs.last_name) AS project_owner
			FROM projects
			JOIN web_devs ON projects.web_dev_id = web_devs.web_dev_id
			WHERE projects.web_dev_id = ? 
			GROUP BY projects.project_name;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$web_dev_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}


function insertProject($pdo, $project_name, $technologies_used, $web_dev_id) {
	$sql = "INSERT INTO projects (project_name, technologies_used, web_dev_id) VALUES (?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_name, $technologies_used, $web_dev_id]);
	if ($executeQuery) {
		return true;
	}

}

function getProjectByID($pdo, $project_id) {
	$sql = "SELECT 
				projects.project_id AS project_id,
				projects.project_name AS project_name,
				projects.technologies_used AS technologies_used,
				projects.date_added AS date_added,
				CONCAT(web_devs.first_name,' ',web_devs.last_name) AS project_owner
			FROM projects
			JOIN web_devs ON projects.web_dev_id = web_devs.web_dev_id
			WHERE projects.project_id  = ? 
			GROUP BY projects.project_name";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateProject($pdo, $project_name, $technologies_used, $project_id) {
	$sql = "UPDATE projects
			SET project_name = ?,
				technologies_used = ?
			WHERE project_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_name, $technologies_used, $project_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteProject($pdo, $project_id) {
	$sql = "DELETE FROM projects WHERE project_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$project_id]);
	if ($executeQuery) {
		return true;
	}
}




?>
