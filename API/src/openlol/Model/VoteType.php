<?php

namespace Openlol\Model
{

    use MyCLabs\Enum\Enum;

    class VoteType extends Enum
    {
        private const Upvote    = 1;
        private const Downvote  = -1;
    }
}