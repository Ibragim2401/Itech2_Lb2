<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work</title>
    <style>
        header 
        {
            background-color:antiquewhite ;
            padding: 1rem;
            text-align: center;
            color: black;
        }

        .container
        {
            display: flex;
            justify-content: space-between;
            border: 3px solid #ccc;
            padding: 20px;
            margin-top: 30px;
        }

        .tasks
        {
            width: 500px;
            height: 300px;
            background-color: antiquewhite;
            margin: 10px;
            font-size: 20px;
            text-align: center;
        }

        .button {
            padding: 10px 20px;
            background-color: chocolate;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <h1>Лабораторна робота №1</h1>
    </header>
    <div class="container">
        <div class="tasks">
            <p style="padding-top: 20px;">The number of subordinates of each chief</p>
            <form action="workers.php" method="get">
            <label for="name">Chief name: </label>
            <select id="name" name="chief_name">
                <option value="Jobs">Jobs</option>
                <option value="Wozniak">Wozniak</option>
                <option value="Gates">Gates</option>
                <option value="Stark">Stark</option>
                <option value="Brown">Brown</option>
            </select>
            <button type="submit" class="button">Enter</button>
            </form>
        </div>
        <div class="tasks">
            <p style="padding-top: 20px;">Total time spent on the selected project (in days)</p>
            <form action="totaltime.php" method="get">
            <label for="project">Project name: </label>
            <select id="project" name="project_name">
                <option value="Project_1, Hospital">Project_1, Hospital</option>
                <option value="Project_2, Bank">Project_2, Bank</option>
                <option value="Project_3, Police">Project_3, Police</option>
                <option value="Project_4, Government">Project_4, Government</option>
                <option value="Project_5, App">Project_5, App</option>
                <option value="Project_6">Project_6</option>
                <option value="Project_7">Project_7</option>
            </select>
            <button type="submit" class="button">Enter</button>
            </form>
        </div>
        <div class="tasks">
            <p style="padding: 20px 10px;">Infos on completed tasks for the specified project 
                on the selected date</p>
            <form action="information.php" method="get">
            <label for="project">Project name:</label>
            <select id="project" name="project_name">
                <option value="Project_1, Hospital">Project_1, Hospital</option>
                <option value="Project_2, Bank">Project_2, Bank</option>
                <option value="Project_3, Police">Project_3, Police</option>
                <option value="Project_4, Government">Project_4, Government</option>
                <option value="Project_5, App">Project_5, App</option>
                <option value="Project_6">Project_6</option>
                <option value="Project_7">Project_7</option>
            </select><br>
            <label for="dateInput">Enter date:</label>
            <input type="date" id="dateInput" name="selected_date"><br><br>
            <input type="submit" value="Enter" class="button">
            </form>
        </div>
    </div>
</body>

</html>