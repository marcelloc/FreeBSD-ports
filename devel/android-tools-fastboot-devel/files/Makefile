# $FreeBSD$

PROG_CXX=fastboot
BINDIR?=/usr/bin

SRCS+=	bootimg_utils.cpp
SRCS+=	engine.cpp
SRCS+=	fastboot.cpp
SRCS+=	fs.cpp
SRCS+=	protocol.cpp
SRCS+=	util.cpp

.PATH:	${FILESDIR}
SRCS+=	usb_freebsd.cpp
SRCS+=	util_freebsd.cpp

# required by libziparchive
.PATH: ${.CURDIR}/../base
SRCS+=	file.cpp

# required by fastboot
.PATH: ${.CURDIR}/../ext4_utils
SRCS+=	allocate.c
SRCS+=	contents.c
SRCS+=	crc16.c
SRCS+=	ext4_sb.c
SRCS+=	ext4_utils.c
SRCS+=	ext4fixup.c
SRCS+=	extent.c
SRCS+=	indirect.c
SRCS+=	make_ext4fs.c
SRCS+=	sha1.c
SRCS+=	wipe.c

# required by base and libutils
.PATH:	${.CURDIR}/../liblog
SRCS+=	fake_log_device.c
SRCS+=	logd_write.c
CPPFLAGS.logd_write.c+=	-DFAKE_LOG_DEVICE=1

# required by ext4_utils
.PATH:	${.CURDIR}/../libselinux/src
SRCS+=	callbacks.c
SRCS+=	check_context.c
SRCS+=	freecon.c
SRCS+=	init.c
SRCS+=	label.c
SRCS+=	label_android_property.c
SRCS+=	label_file.c
SRCS+=	label_support.c
CPPFLAGS.init.c+=	-DDARWIN # statfs
CPPFLAGS.label_file.c+=	-D_WITH_GETLINE

# required by fastboot and ext4_utils
.PATH:	${.CURDIR}/../libsparse
SRCS+=	backed_block.c
SRCS+=	output_file.c
SRCS+=	sparse.c
SRCS+=	sparse_crc32.c
SRCS+=	sparse_err.c
SRCS+=	sparse_read.c

# required by libziparchive
.PATH: ${.CURDIR}/../libutils
SRCS+=	FileMap.cpp

# required by fastboot
.PATH:	${.CURDIR}/../libziparchive
SRCS+=	zip_archive.cc

CPPFLAGS+=	-Doff64_t=off_t
CPPFLAGS+=	-Dftruncate64=ftruncate
CPPFLAGS+=	-Dlseek64=lseek
CPPFLAGS+=	-Dmmap64=mmap
CPPFLAGS+=	-Dpread64=pread
CPPFLAGS+=	-I${.CURDIR}
CPPFLAGS+=	-I${.CURDIR}/../include
CPPFLAGS+=	-I${.CURDIR}/../mkbootimg
CPPFLAGS+=	-I${.CURDIR}/../base/include
CPPFLAGS+=	-I${.CURDIR}/../ext4_utils
CPPFLAGS+=	-I${.CURDIR}/../f2fs_utils
CPPFLAGS+=	-I${.CURDIR}/../libselinux/include
CPPFLAGS+=	-I${.CURDIR}/../libsparse/include
CPPFLAGS+=	${CPPFLAGS.${.IMPSRC:T}}
CXXFLAGS+=	-D__STDC_LIMIT_MACROS # DragonFly
CXXFLAGS+=	-std=gnu++11

.ifndef COMPILE.c
CFLAGS+=	${CPPFLAGS}
CXXFLAGS+=	${CPPFLAGS}
.endif

LDADD+=	-lpcre -lusb -lz
DPADD+=	${LIBPCRE} ${LIBUSB} ${LIBZ}

.include <bsd.prog.mk>
