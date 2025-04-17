<?php

# Dependency Inversion Principle

enum Teams: string
{
    case BLUE_TEAM = 'Blue';
    case RED_TEAM = 'Red';
    case GREEN_TEAM = 'Green';
}

interface TeamMembershipLookup {
    public function find_all_students_of_team(Teams $team);
}

class Student {
    public string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }
}

class TeamMemberships implements TeamMembershipLookup {
    private array $array = [];

    public function add_team_memberships(Student $student, Teams $team) {
        $this->array[] = [
            'team' => $team,
            'student' => $student,
        ];
    }

    public function find_all_students_of_team(Teams $team) {
        $names = [];
        foreach ($this->array as $member) {
            if ($member['team'] === $team) {
                $names[] = $member['student']->name;
            }
        }
        return $names;
    }
}

class Analysis {
    private TeamMembershipLookup $team_student_memberships;

    public function __construct(TeamMembershipLookup $team_student_memberships) {
        $this->team_student_memberships = $team_student_memberships;
    }

    public function print_team_list(Teams $team) {
        $names = $this->team_student_memberships->find_all_students_of_team($team);
        foreach ($names as $name) {
            echo $name . " is in " . $team->value . " team" . PHP_EOL;
        }
    }
}

$student1 = new Student('Ravi');
$student2 = new Student('Archie');
$student3 = new Student('James');

$team_memberships = new TeamMemberships();
$team_memberships->add_team_memberships($student1, Teams::BLUE_TEAM);
$team_memberships->add_team_memberships($student2, Teams::RED_TEAM);
$team_memberships->add_team_memberships($student3, Teams::BLUE_TEAM);

$analysis = new Analysis($team_memberships);
$analysis->print_team_list(Teams::RED_TEAM);