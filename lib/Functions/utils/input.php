<?php



/**
 * Validate and sanitize input data from $_POST
 *
 * @param array $attrs an associative array with keys as input names and values as expected input types
 * @param array $fillable an array of input names that must be present in the post data
 * @param callable|null $errorHandler a callback function to handle validation errors. If not provided, the
 *                                    function will die with an error message
 *
 * @return array|null an associative array with sanitized input data or null if validation fails
 * @throws \RuntimeException if any of the required fields are not present in the post data or if the input
 *                          type does not match the expected type
 */
function input(array $attrs, array $fillable, ?callable $errorHandler): array|null


{

    try {
        $result = [];
        $errors = [];

        foreach ($fillable as $key) {
            if (!array_key_exists($key, $attrs) || empty(trim($_POST[$key]))) {
                $errors[] = "Field $key is required! <br>";
            }
        }
        if (!empty($errors)) {
            echo "<div style='position: absolute; border-radius: 0px !important; top: 570px; text-align: center; left: 0; width: 100%;' class='alert alert-danger rounded'>" . implode('', $errors) . "</div>";
            if ($errorHandler) {
                foreach ($errors as $error) {
                    call_user_func($errorHandler, $error);
                }
            }
            die();
        }

        foreach ($attrs as $key => $type) {

            if (!array_key_exists($key, $_POST)) {
                throw new \RuntimeException("Key {$key} does not exist!");
            }

            if (gettype($_POST[$key]) !== $type) {
                throw new \RuntimeException("Wrong input type for {$key}. Expected" . ' ' . gettype($_POST[$key]) . " instead of " . $type);
            }

            $result[$key] = trim($_POST[$key]);


        }
        return $result;
    } catch (Exception $e) {
        echo $e->getMessage();
        return null;
    }
}
