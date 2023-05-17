<?php

namespace App\Workflow;

use Symfony\Component\Workflow\DefinitionBuilder;
use Symfony\Component\Workflow\MarkingStore\SingleStateMarkingStore;
use Symfony\Component\Workflow\Transition;
use Symfony\Component\Workflow\Workflow;

class TaskWorkflow
{
    public const STATUS_NEW = 'new';
    public const STATUS_IN_PROGRESS = 'in_progress';
    public const STATUS_COMPLETED = 'completed';

    public static function get(): Workflow
    {
        $builder = new DefinitionBuilder();

        $builder->addPlaces([
            self::STATUS_NEW,
            self::STATUS_IN_PROGRESS,
            self::STATUS_COMPLETED,
        ]);

        $builder->addTransition(new Transition('start', self::STATUS_NEW, self::STATUS_IN_PROGRESS));
        $builder->addTransition(new Transition('complete', self::STATUS_IN_PROGRESS, self::STATUS_COMPLETED));

        $definition = $builder->build();
        $markingStore = new SingleStateMarkingStore('status');

        return new Workflow($definition, $markingStore);
    }
}
