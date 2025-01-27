<?php

declare(strict_types=1);

namespace PoPCMSSchema\Comments\ConditionalOnComponent\Users\TypeAPIs;

interface CommentTypeAPIInterface
{
    public function getCommentUserId(object $comment): string | int | null;
}
