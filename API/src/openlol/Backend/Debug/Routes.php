<?php
namespace Openlol\Backend\Debug
{

    use Openlol\Model\VoteType;
    use Slim\App;
    use Slim\Http\Request;
    use Slim\Http\Response;


    class Routes
    {
        static function getRoutes(App $app)
        {
            $container = $app->getContainer();

            $app->group('/debug', function (App $app) use ($container)
            {
                $container->get('logger')->info("Debug route '/debug' accessed");

                $app->group('/user', function (App $app) use ($container)
                {
                    $container->get('logger')->info("Debug route '/debug/user' accessed");

                    $app->get('/{id:[0-9]+}', function (Request $request, Response $response, array $args)
                    {
                        return $response->withJson(array($args));

                    });

                });

                $app->get('/phpenum', function (Request $request, Response $response, array $args)
                {
                    return $response->withJson([
                        'upvote'    => VoteType::Upvote(),
                        'downvote'  => VoteType::Downvote()
                    ]);
                });
            });

        }
    }
}
