<?php
namespace Core;

class Router
{
    private $routes = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'DELETE' => [],
    ];

    public function get($uri, $callback)
    {


        try {
            if (empty($uri)) {
                throw new \Exception("URI cannot be empty");
            }

            if (is_string($callback)) {

                $viewPath = __DIR__ . '/../src/Views/' . $callback . '.php';
                if (!file_exists($viewPath)) {
                    throw new \Exception("View file $callback.php does not exist in the views directory.");
                }
                // If it's a string, directly render the view (load the file)
                $this->routes['GET'][$uri] = function () use ($callback) {
                    include __DIR__ . '/../src/Views/' . $callback . '.php';
                };
                return;
            }


            if (is_array($callback)) {
                list($controller, $method) = $callback;

                if (!class_exists($controller)) {
                    throw new \Exception("Controller class $controller does not exist");
                }

                if (!method_exists($controller, $method)) {
                    throw new \Exception("Method $method does not exist in controller class $controller");
                }

                // Store controller method callback
                $this->routes['GET'][$uri] = $callback;
                return;
            }

            if (!is_callable($callback) && (!is_array($callback) || count($callback) !== 2)) {
                throw new \Exception(
                    "Callback must be a callable or an array with controller class and method. Received: " . print_r($callback, true)
                );
            }

            // list($controller, $method) = $callback;

            // if (!class_exists($controller)) {
            //     throw new \Exception("Controller class $controller does not exist");
            // }

            // if (!method_exists($controller, $method)) {
            //     throw new \Exception("Method $method does not exist in controller class $controller");
            // }

            $this->routes['GET'][$uri] = $callback;
        } catch (\Exception $e) {
            echo "Error registering route GET $uri: " . $e->getMessage() . "\n";
        }
    }

    public function post($uri, $callback)
    {
        $this->routes['POST'][$uri] = $callback;
    }

    public function put($uri, $callback)
    {
        $this->routes['PUT'][$uri] = $callback;
    }

    public function delete($uri, $callback)
    {
        $this->routes['DELETE'][$uri] = $callback;
    }

    public function resolve()
    {
        $uri = $this->getUri();
        $method = $_SERVER['REQUEST_METHOD'];

        if (isset($this->routes[$method][$uri])) {
            $callback = $this->routes[$method][$uri];

            // if (is_array($callback)) {
            //     $controllerClass = $callback[0];
            //     $method = $callback[1];

            //     $controller = $this->getControllerInstance($controllerClass);

            //     try {
            //         call_user_func([$controller, $method], new Request(), new Response());
            //     } catch (\Exception $e) {
            //         echo "Error calling controller method: " . $e->getMessage() . "\n";
            //     }
            // } else {
            //     try {
            //         call_user_func($callback, new Request(), new Response());
            //     } catch (\Exception $e) {
            //         echo "Error calling callback: " . $e->getMessage() . "\n";
            //     }
            // }
            try {
                if (is_array($callback)) {
                    $controllerClass = $callback[0];
                    $method = $callback[1];
                    $controller = $this->getControllerInstance($controllerClass);
                    call_user_func([$controller, $method], new Request(), new Response());
                } elseif (is_callable($callback)) {
                    call_user_func($callback, new Request(), new Response());
                } elseif (is_string($callback)) {
                    $viewPath = __DIR__ . '/../src/Views/' . $callback . '.php';
                    include $viewPath;
                } else {
                    throw new \Exception("Invalid callback type");
                }
            } catch (\Exception $e) {
                echo "Error resolving route: " . $e->getMessage() . "\n";
            }
        } else {
            // Serve static files or return 404
            if ($this->isStaticFile($uri)) {
                $this->serveStaticFile($uri);
            } else {
                header("HTTP/1.0 404 Not Found");
                echo "Not Found";
            }
        }
    }

    private function getControllerInstance($controllerClass)
    {
        $reflectionClass = new \ReflectionClass($controllerClass);
        $constructor = $reflectionClass->getConstructor();

        if (!$constructor) {
            return new $controllerClass();
        }

        $parameters = $constructor->getParameters();
        $dependencies = [];

        foreach ($parameters as $parameter) {
            $dependencyType = $parameter->getType();
            if ($dependencyType instanceof \ReflectionNamedType && !$dependencyType->isBuiltin()) {
                $dependencies[] = $this->resolveDependency($dependencyType->getName());
            }
        }

        return $reflectionClass->newInstanceArgs($dependencies);
    }

    private function resolveDependency($class)
    {
        $reflectionClass = new \ReflectionClass($class);
        $constructor = $reflectionClass->getConstructor();

        if (!$constructor) {
            return new $class();
        }

        $parameters = $constructor->getParameters();
        $dependencies = [];

        foreach ($parameters as $parameter) {
            $dependencyType = $parameter->getType();
            if ($dependencyType instanceof \ReflectionNamedType && !$dependencyType->isBuiltin()) {
                $dependencies[] = $this->resolveDependency($dependencyType->getName());
            }
        }

        return $reflectionClass->newInstanceArgs($dependencies);
    }

    private function getUri()
    {
        // This removes the base path only if it's in use
        $uri = $_SERVER['REQUEST_URI'];

        // If you are using a specific base path (for example `/bolt`), ensure it's stripped correctly
        $basePath = '/bolt';
        if (strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath));
        }

        // Remove query string if present
        if (strpos($uri, '?') !== false) {
            $uri = strstr($uri, '?', true);
        }

        // Trim any leading or trailing slashes
        $uri = trim($uri, '/');

        // Default to `/` if URI is empty
        if (empty($uri)) {
            $uri = '/';
        } else {
            $uri = '/' . $uri;
        }

        return $uri;
    }


    private function isStaticFile($uri)
    {
        $filePath = __DIR__ . '/../public' . $uri;
        return file_exists($filePath) && !is_dir($filePath);
    }

    private function serveStaticFile($uri)
    {
        $filePath = __DIR__ . '/../public' . $uri;
        $mimeType = mime_content_type($filePath);
        header('Content-Type: ' . $mimeType);
        readfile($filePath);
    }
}
