# example

```jsx
import { useState } from 'react';
import { DragDropContext, Droppable, Draggable } from 'react-beautiful-dnd';

export default function KanbanBoard() {
    const [tasks, setTasks] = useState([
        { id: 'task-1', content: 'Task 1' },
        { id: 'task-2', content: 'Task 2' },
        { id: 'task-3', content: 'Task 3' },
    ]);

    const onDragEnd = (result) => {
        if (!result.destination) {
            return;
        }

        const { source, destination } = result;
        const newTasks = [...tasks];
        const [removed] = newTasks.splice(source.index, 1);
        newTasks.splice(destination.index, 0, removed);

        setTasks(newTasks);
    };

    return (
        <DragDropContext onDragEnd={onDragEnd}>
            <Droppable droppableId="board">
                {(provided) => (
                    <div
                        {...provided.droppableProps}
                        ref={provided.innerRef}
                    >
                        {tasks.map((task, index) => (
                            <Draggable
                                key={task.id}
                                draggableId={task.id}
                                index={index}
                            >
                                {(provided) => (
                                    <div
                                        {...provided.draggableProps}
                                        {...provided.dragHandleProps}
                                        ref={provided.innerRef}
                                        className="border"
                                    >
                                        {task.content}
                                    </div>
                                )}
                            </Draggable>
                        ))}
                        {provided.placeholder}
                    </div>
                )}
            </Droppable>
        </DragDropContext>
    );
}
```
