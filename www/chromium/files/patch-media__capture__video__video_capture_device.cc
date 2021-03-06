--- media/capture/video/video_capture_device.cc.orig	2015-10-21 18:00:38.000000000 -0400
+++ media/capture/video/video_capture_device.cc	2015-10-23 12:51:56.086998000 -0400
@@ -11,6 +11,10 @@
 
 namespace media {
 
+const std::string VideoCaptureDevice::Name::GetModel() const {
+  return "";
+}
+
 // TODO(msu.koo): http://crbug.com/532272, remove checking the switch in favour
 // of deferring GetModel() call to the actual VideoCaptureDevice object.
 const std::string VideoCaptureDevice::Name::GetNameAndModel() const {
@@ -33,7 +37,7 @@
     : device_name_(name), unique_id_(id) {
 }
 
-#if defined(OS_LINUX)
+#if defined(OS_LINUX) || defined(OS_BSD)
 VideoCaptureDevice::Name::Name(const std::string& name,
                                const std::string& id,
                                const CaptureApiType api_type)
@@ -80,7 +84,7 @@
 VideoCaptureDevice::Name::~Name() {
 }
 
-#if defined(OS_LINUX)
+#if defined(OS_LINUX) || defined(OS_BSD)
 const char* VideoCaptureDevice::Name::GetCaptureApiTypeString() const {
   switch (capture_api_type()) {
     case V4L2_SINGLE_PLANE:
