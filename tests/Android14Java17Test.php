<?php

namespace Tests;

class Android14Java17Test extends Base
{
    protected string $sdkName = 'android';
    protected string $sdkPlatform = 'client';
    protected string $sdkLanguage = 'android';
    protected string $version = '0.0.1';

    protected string $language = 'android';
    protected string $class = 'Appwrite\SDK\Language\Android';
    protected array $build = [
        'mkdir -p tests/sdks/android/library/src/test/java',
        'cp tests/languages/android/Tests.kt tests/sdks/android/library/src/test/java/Tests.kt',
        'chmod +x tests/sdks/android/gradlew',
    ];
    protected string $command =
        'docker run --network="mockapi" -v $(pwd):/app -w /app/tests/sdks/android alvrme/alpine-android:android-34-jdk17 sh -c "./gradlew :library:testReleaseUnitTest --stacktrace --scan -q && cat library/result.txt && cat library/build/reports/tests/testReleaseUnitTest/classes/io.appwrite.ServiceTest.html"';

    protected array $expectedOutput = [
        ...Base::FOO_RESPONSES,
        ...Base::BAR_RESPONSES,
        ...Base::GENERAL_RESPONSES,
        ...Base::UPLOAD_RESPONSES,
        ...Base::ENUM_RESPONSES,
        ...Base::EXCEPTION_RESPONSES,
        ...Base::REALTIME_RESPONSES,
        ...Base::COOKIE_RESPONSES,
        ...Base::QUERY_HELPER_RESPONSES,
        ...Base::PERMISSION_HELPER_RESPONSES,
        ...Base::ID_HELPER_RESPONSES
    ];
}
