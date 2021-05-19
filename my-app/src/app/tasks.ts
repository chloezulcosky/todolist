enum taskStatus {
  Complete  = "Complete",
  Incomplete   = "Incomplete"
}

export interface ITask{
  taskID: number;
  taskName: string;
  taskDescription: string,
  status: taskStatus;
}

export interface UserSettings {
  tName: string;
  tDescription: string;
}

