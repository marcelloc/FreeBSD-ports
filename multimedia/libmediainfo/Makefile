# Created by: Sunpoet Po-Chuan Hsieh <sunpoet@FreeBSD.org>
# $FreeBSD$

PORTNAME=	libmediainfo
PORTVERSION=	0.7.77
CATEGORIES=	multimedia
MASTER_SITES=	http://mediaarea.net/download/binary/mediainfo/${PORTVERSION}/ \
		LOCAL/sunpoet
DISTNAME=	MediaInfo_CLI_${PORTVERSION}_GNU_FromSource

MAINTAINER=	sunpoet@FreeBSD.org
COMMENT=	MediaInfo library

LICENSE=	BSD2CLAUSE

LIB_DEPENDS=	libzen.so:${PORTSDIR}/multimedia/libzen

CONFLICTS_INSTALL=	mediainfo-0.[0-6]* mediainfo-0.7.[0-5]*

OPTIONS_DEFINE=	CURL MMS TINYXML2
OPTIONS_DEFAULT=TINYXML2
TINYXML2_DESC=	Use textproc/tinyxml2 instead of bundled one

CONFIGURE_ARGS=	--enable-shared
CPPFLAGS+=	-I${LOCALBASE}/include
GNU_CONFIGURE=	yes
INSTALL_TARGET=	install-strip
USE_LDCONFIG=	yes
USES=		alias libtool pathfix pkgconfig tar:bzip2

WRKSRC=		${WRKDIR}/MediaInfo_CLI_GNU_FromSource/MediaInfoLib/Project/GNU/Library

CURL_CONFIGURE_ON=	--with-libcurl=${LOCALBASE}
CURL_LIB_DEPENDS=	libcurl.so:${PORTSDIR}/ftp/curl
MMS_CONFIGURE_ON=	--with-libmms=${LOCALBASE}
MMS_LDFLAGS=		-L${LOCALBASE}/lib -lmms
MMS_LIB_DEPENDS=	libmms.so:${PORTSDIR}/net/libmms
TINYXML2_CONFIGURE_ENV=	TINYXML2_CFLAGS=-I${LOCALBASE}/include TINYXML2_LIBS="-L${LOCALBASE}lib -ltinyxml2"
TINYXML2_CONFIGURE_ON=	--with-libtinyxml2=yes
TINYXML2_LIB_DEPENDS=	libtinyxml2.so:${PORTSDIR}/textproc/tinyxml2

post-patch:
	@${REINPLACE_CMD} \
		-e 's|../../../../ZenLib/Project/GNU/Library/libzen-config|${LOCALBASE}/bin/libzen-config|' \
		-e 's|lib/pkgconfig/|libdata/pkgconfig/|g' \
		-e 's|-DMEDIAINFO_LIBMMS_FROMSOURCE||g' \
		-e 's|with_libmms/pkgconfig/|with_libmms/libdata/pkgconfig/|' \
		-e 's|src/.libs|lib|g' ${WRKSRC}/configure
	@${REINPLACE_CMD} -e '1 s|bin/bash|bin/sh|' ${WRKSRC}/libmediainfo-config.in

post-install:
	${INSTALL_SCRIPT} ${WRKSRC}/libmediainfo-config ${STAGEDIR}${PREFIX}/bin/libmediainfo-config
	${INSTALL_DATA} ${WRKSRC}/libmediainfo.pc ${STAGEDIR}${PREFIX}/libdata/pkgconfig/libmediainfo.pc
	${RM} -fr ${STAGEDIR}${PREFIX}/include/MediaInfoDLL/

.include <bsd.port.mk>
