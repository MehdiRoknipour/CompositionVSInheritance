
public interface IMoveable
{
    int Move(int CurrentPostion);
}

public class MoveByOne : IMoveable
{
    public int Move(int CurrentPostion)
    {
        return CurrentPostion += 1;
    }
}

public class MoveByTwo : IMoveable
{
    public int Move(int CurrentPostion)
    {
        return CurrentPostion += 2;
    }
}

public class InheritanceSoldier : MoveByOne
{
    int Position { get; set; }

    public void Move()
    {
        int nextPosition = Move(Position);
        // do anything with nextPosition
    }
}

public class CompositionSoldier
{
    int Position { get; set; }
    IMoveable _moveable;

    public void SetMoveBahavaior(IMoveable moveable) { _moveable = moveable; }

    public void Move()
    {
        int nextPosition = _moveable.Move(Position);
        // do anything with nextPosition
    }
}

public class Soldier : CompositionSoldier
{
    bool someCondition = true;
    MoveByOne moveByOne = new MoveByOne();
    MoveByTwo moveByTwo = new MoveByTwo();

    public void Main()
    {
        SetMoveBahavaior(moveByOne);
        Move();

        if (someCondition) SetMoveBahavaior(moveByTwo);
        Move();
    }
}
